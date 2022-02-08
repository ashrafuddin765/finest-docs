<?php
namespace FDDOCS;
/**
 * Ajax Class.
 */
class Ajax {

    /**
     * Bind actions.
     */
    public function __construct() {
        add_action( 'wp_ajax_fddocs_feedback', [$this, 'feedback_handler'] );
        add_action( 'wp_ajax_nopriv_fddocs_feedback', [$this, 'feedback_handler'] );

        add_action( 'wp_ajax_fddocs_get_articles', [$this, 'get_articles'] );
        add_action( 'wp_ajax_nopriv_fddocs_get_articles', [$this, 'get_articles'] );

        add_action( 'wp_ajax_fddocs_search_article', [$this, 'get_articles'] );
        add_action( 'wp_ajax_nopriv_fddocs_search_article', [$this, 'get_articles'] );

        add_action( 'wp_ajax_fddocs_show_article', [$this, 'show_article'] );
        add_action( 'wp_ajax_nopriv_fddocs_show_article', [$this, 'show_article'] );
    }

    public function feedback_handler() {

        check_ajax_referer( 'fddocs-nonce' );
        $template = '<div class="wedocs-alert wedocs-alert-%s">%s</div>';
        $previous = isset( $_COOKIE['fddocs_response'] ) ? explode( ',', $_COOKIE['fddocs_response'] ) : [];
        $post_id  = intval( $_POST['post_id'] );
        $type     = in_array( $_POST['type'], ['like', 'dislike'] ) ? $_POST['type'] : false;

        // check previous response
        if ( in_array( $post_id, $previous ) ) {
            $message = sprintf( $template, 'danger', __( 'Sorry, you\'ve already recorded your feedback!', 'wedocs' ) );
            wp_send_json_error( false );
        }

        // seems new
        if ( $type ) {
            $count = (int) get_post_meta( $post_id, $type, true );
            update_post_meta( $post_id, $type, $count + 1 );

            array_push( $previous, $post_id );
            $cookie_val = implode( ',', $previous );

            $val = setcookie( 'fddocs_response', $cookie_val, time() + WEEK_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
        }

        $message = sprintf( $template, 'success', __( 'Thanks for your feedback!', 'wedocs' ) );
        wp_send_json_success( $message );
    }

    /**
     * Get all articles.
     *
     * @return void
     */
    public function get_articles() {
        check_ajax_referer( 'fddocs-nonce' );

        $search_key  = false;
        $search_type = 'doc';
        $args        = [
            'post_type'      => 'docs',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ];

        if ( isset( $_POST['doc_search'] ) && !empty( $_POST['doc_search'] ) ) {
            $search_key = sanitize_text_field( $_POST['doc_search'] );
        }

        if ( isset( $_POST['article_search'] ) && !empty( $_POST['article_search'] ) ) {
            $search_key  = sanitize_text_field( $_POST['article_search'] );
            $search_type = 'article';
        }

        if ( false != $search_key ) {
            $args['s'] = $search_key;
        }

        $docs = get_posts( $args );

        $arranged = $this->build_tree( $docs, 0, $search_key, $search_type );
        usort( $arranged, [$this, 'sort_callback'] );
        wp_send_json_success( $arranged );
    }

    /**
     * Get all articles.
     *
     * @return void
     */
    public function search_articles() {
        check_ajax_referer( 'fddocs-nonce' );

        if ( !isset( $_POST['s'] ) ) {
            wp_send_json_error();
        }

        $search_key = $_POST['s'];

        $docs = get_posts( [
            'post_type'      => 'docs',
            'posts_per_page' => '10',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'meta_key'       => 'doc_type',
            'meta_value'     => 'article',
            's'              => $search_key,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => 'doc_type',
                    'value'   => 'article',
                    'compare' => '=',
                    'type'    => 'CHAR',
                ),
            ),

        ] );

        $arranged = $this->build_tree( $docs, 0, $search_key );
        usort( $arranged, [$this, 'sort_callback'] );
        wp_send_json_success( $arranged );
    }

    /**
     * Get all articles.
     *
     * @return void
     */
    public function show_article() {
        check_ajax_referer( 'fddocs-nonce' );

        if ( !isset( $_POST['id'] ) ) {
            wp_send_json_error();
        }

        $id = $_POST['id'];

        $docs = get_post( $id );

        // $arranged = $this->build_tree( $docs, 0, $search_key );
        // usort( $arranged, [$this, 'sort_callback'] );
        wp_send_json_success( $docs );
    }

    /**
     * Build a tree of docs with parent-child relation.
     *
     * @param array $docs
     * @param int   $parent
     *
     * @return array
     */
    public function build_tree( $docs, $parent = 0, $search_key = false, $search_type = 'dpc' ) {
        $result = [];
        $type   = 'docs';
        if ( !$docs ) {
            return $result;
        }

        if ( false != $search_key ) {
            $type = 'search';
        }

        $post_type_object = get_post_type_object( 'docs' );

        foreach ( $docs as $key => $doc ) {
            if ( $doc->post_parent == $parent ) {
                unset( $docs[$key] );

                // build tree and sort
                if ( 'doc' == $search_type && !empty( $search_key ) ) {
                    $articles = '';
                    $args     = [
                        'numberposts' => -1,
                        'post_type'   => 'docs',
                        'post_parent' => $doc->ID,
                    ];
                    $sections = get_posts( $args );
                    foreach ( $sections as $section ) {
                        $args = [
                            'numberposts' => -1,
                            'post_type'   => 'docs',
                            'post_parent' => $section->ID,
                        ];
                        $articles = get_posts( $args );

                        foreach ( $articles as $article ) {

                            $child[] = [
                                'post' => [
                                    'child' => [
                                            [
                                            'post' => [
                                                'type'    => 'articles',
                                                'id'      => $article->ID,
                                                'title'   => $article->post_title,
                                                'status'  => $article->post_status,
                                                'order'   => $article->menu_order,
                                                'slug'    => $article->post_name,
                                                'excerpt' => wp_trim_words( $article->post_content, 15 ),
                                            ],
                                        ],
                                    ],

                                ],
                            ];
                        }
                    }

                } else {

                    $child = $this->build_tree( $docs, $doc->ID );
                }
                usort( $child, [$this, 'sort_callback'] );

                $title = $doc->post_title;
                if ( $search_key ) {

                    $title = preg_replace( '/(' . $search_key . ')/iu', '<strong class="search-highlight">\0</strong>', $doc->post_title );
                }

                $title = $doc->post_title;
                if ( $search_key ) {

                    $title = preg_replace( '/(' . $search_key . ')/iu', '<strong class="search-highlight">\0</strong>', $doc->post_title );
                }

                $result[] = [
                    'post' => [
                        'type'    => $type,
                        'id'      => $doc->ID,
                        'title'   => $title,
                        'status'  => $doc->post_status,
                        'order'   => $doc->menu_order,
                        'slug'    => $doc->post_name,
                        'excerpt' => wp_trim_words( $doc->post_content, 15 ),
                        'child'   => $child,
                    ],
                ];
            }
        }

        // foreach ( $docs as $key => $doc ) {
        //     if ( $doc->post_parent == $parent ) {
        //         unset( $docs[$key] );

        //         // build tree and sort
        //         $child = $this->build_tree( $docs, $doc->ID );
        //         usort( $child, [$this, 'sort_callback'] );

        //         $title = $doc->post_title;
        //         if ( $search_key ) {

        //             $title = preg_replace( '/(' . $search_key . ')/iu', '<strong class="search-highlight">\0</strong>', $doc->post_title );
        //         }

        //         $result[] = [
        //             'post'  => [
        //                 'id'     => $doc->ID,
        //                 'title'  => $title,
        //                 'status' => $doc->post_status,
        //                 'order'  => $doc->menu_order,
        //                 'slug'   => $doc->post_name,
        //                 'caps'   => [
        //                     'edit'   => current_user_can( $post_type_object->cap->edit_post, $doc->ID ),
        //                     'delete' => current_user_can( $post_type_object->cap->delete_post, $doc->ID ),
        //                 ],
        //             ],
        //             'child' => $child,
        //         ];
        //     }
        // }

        return $result;
    }
    /**
     * Sort callback for sorting posts with their menu order.
     *
     * @param array $a
     * @param array $b
     *
     * @return int
     */
    public function sort_callback( $a, $b ) {
        return $a['post']['order'] - $b['post']['order'];
    }
}

$ajax = new Ajax();