<?php
function fddocs_get_template_part( $slug, $name = '' ) {

    $templates = [];
    $name      = (string) $name;

    // lookup at theme/slug-name.php or finest/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = FINEST_DOCS_TEMPLATE . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( FINEST_DOCS_TEMPLATE . "{$slug}-{$name}.php" ) ) {
        $template = FINEST_DOCS_TEMPLATE . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = [
            "{$slug}.php",
            $fddocs->FINEST_DOCS_TEMPLATE . "{$slug}.php",
        ];

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}

function fddocs_breadcrumbs() {
    global $post;

    $html = '';
    $args = apply_filters( 'fddocs_breadcrumbs', [
        'delimiter' => '<li class="delimiter"><span class="dashicons dashicons-arrow-right-alt2"></span></li>',
        'home'      => __( 'Home', 'finest-docs' ),
        'before'    => '<li><span class="current">',
        'after'     => '</span></li>',
    ] );

    $breadcrumb_position = 1;

    $html .= '<ul class="fddocs-breadcrumb" itemscope >';
    $html .= fddocs_get_breadcrumb_item( $args['home'], home_url( '/' ), $breadcrumb_position );
    $html .= $args['delimiter'];

    $docs_home = get_option( 'fddocs_documentation_page' );

    if ( $docs_home ) {
        ++$breadcrumb_position;

        $html .= fddocs_get_breadcrumb_item( __( 'Docs', 'finest-docs' ), get_permalink( $docs_home ), $breadcrumb_position );
        $html .= $args['delimiter'];
    }

    if ( 'docs' == $post->post_type && $post->post_parent ) {
        $parent_id   = $post->post_parent;
        $breadcrumbs = [];

        while ( $parent_id ) {
            ++$breadcrumb_position;

            $page          = get_post( $parent_id );
            $breadcrumbs[] = fddocs_get_breadcrumb_item( get_the_title( $page->ID ), get_permalink( $page->ID ), $breadcrumb_position );
            $parent_id     = $page->post_parent;
        }

        $breadcrumbs = array_reverse( $breadcrumbs );

        for ( $i = 0; $i < count( $breadcrumbs ); ++$i ) {
            $html .= $breadcrumbs[$i];
            $html .= ' ' . $args['delimiter'] . ' ';
        }
    }

    $html .= ' ' . $args['before'] . get_the_title() . $args['after'];

    $html .= '</ul>';

    echo apply_filters( 'fddocs_breadcrumbs_html', $html, $args );
}

function fddocs_get_breadcrumb_item( $label, $permalink, $position = 1 ) {

    return '<li itemprop="itemListElement" itemscope >
            <a itemprop="item" href="' . esc_attr( $permalink ) . '">
            <span itemprop="name">' . esc_html( $label ) . '</span></a>
            <meta itemprop="position" content="' . $position . '" />
        </li>';

}

function fddocs_css_strip_whitespace( $css ) {
    $replace = array(
        '#/\*.*?\*/#s' => '', // Strip C style comments.
        '#\s\s+#' => ' ', // Strip excess whitespace.
    );
    $search = array_keys( $replace );
    $css    = preg_replace( $search, $replace, $css );

    $replace = array(
        ': ' => ':',
        '; ' => ';',
        ' {' => '{',
        ' }' => '}',
        ', ' => ',',
        '{ ' => '{',
        ';}' => '}', // Strip optional semicolons.
        ",\n" => ',', // Don't wrap multiple selectors.
        "\n}" => '}', // Don't wrap closing braces.
        '} ' => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys( $replace );
    $css    = str_replace( $search, $replace, $css );

    return trim( $css );
}

function fd_get_posts_children( $parent_id ) {

    $post = get_post( $parent_id );
    if ( empty( $post ) ) {
        return false;
    }
    $children = array();
    // grab the posts children
    $posts = get_posts( array( 'numberposts' => -1, 'post_parent' => $parent_id, 'post_type' => $post->post_type, 'suppress_filters' => false ) );

    // now grab the grand children
    foreach ( $posts as $child ) {
        // recursion!! hurrah
        $children[] = $child->ID;
    }
    // merge in the direct descendants we found earlier

    return !empty( $children ) ? $children : false;
}
/**
 * Duplicates a post & its meta and it returns the new duplicated Post ID
 * @param  [int] $post_id The Post you want to clone
 * @return [int] The duplicated Post ID
 */
function fd_duplicate( $post_id, $parent_id = '' ) {

    // And all the original post data then
    $post = get_post( $post_id );

    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user    = wp_get_current_user();
    $new_post_author = $current_user->ID;

    // if post data exists (I am sure it is, but just in a case), create the post duplicate
    if ( $post ) {

        // new post data array
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $parent_id,
            'post_password'  => $post->post_password,
            'post_status'    => 'publish',
            'post_title'     => $post->post_title . ' copied',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order,
        );

        // insert the post by wp_insert_post() function
        $new_post_id = wp_insert_post( $args );

        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies( get_post_type( $post ) ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        if ( $taxonomies ) {
            foreach ( $taxonomies as $taxonomy ) {
                $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
                wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
            }
        }
        return $new_post_id;
    }

}

function fd_duplicator( $post_id ) {
    $old_parent_id = wp_get_post_parent_id( $post_id );
    $new_post_id   = fd_duplicate( $post_id, $old_parent_id );
    $child_ids     = fd_get_posts_children( $post_id );

    // var_dump($new_post_id);
    if ( $new_post_id && false != $child_ids ) {
        foreach ( $child_ids as $child_id ) {
            $new_child_id = fd_duplicate( $child_id, $new_post_id );
            $sl_child_ids = fd_get_posts_children( $child_id );
            if ( $new_child_id && false != $sl_child_ids ) {
                foreach ( $sl_child_ids as $sl_child_id ) {
                    fd_duplicate( $sl_child_id, $new_child_id );
                }
            }
        }
    }

    return $new_post_id;

}

// body class added

function fddocs_add_body_class( $classes ) {
    $layout = get_theme_mod( 'docs_category_layout', 'layout-01' );

    $classes[] = 'fddocs-body';
    if('docs' == get_post_type() && is_single()){
        $classes[] = 'fddoc-single-'.$layout;
    }

    return  $classes ;
};
add_filter( 'body_class', 'fddocs_add_body_class');


/**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function fddox_register_query_vars( $vars ) {
    $vars[] = 'doc-search';
    return $vars;
}
add_filter( 'query_vars', 'fddox_register_query_vars' );

/**
 * Override Movie Archive Query
 * https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 */
function fddocs_search_query( $query ) {
    // only run this query if we're on the job archive page and not on the admin side
    if ( $query->is_archive( 'docs' ) && $query->is_main_query() && !is_admin() ) {
        // get query vars from url.
        // https://codex.wordpress.org/Function_Reference/get_query_var#Examples
        $search_key = get_query_var( 'doc-search', FALSE );

        $query->set( 's', esc_attr( $search_key ) );
    }
}
add_action( 'pre_get_posts', 'fddocs_search_query' );

add_filter( 'template_include', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template ) {
    global $post;
    $doc_page = get_option( 'fddocs_documentation_page', 0 );
    if ( is_search() && 'docs' == get_query_var( 'post_type' ) ) {
        $page_template = FINEST_DOCS_DIR . 'templates/search.php';
    }


    if ( $doc_page == get_the_ID(  ) ) {

        $page_template = FINEST_DOCS_DIR . '/templates/fddocs.php';

    }

    if ( $page_template == '' ) {
        throw new \Exception( 'No template found' );
    }

    return $page_template;
}

/**
 * Add "Custom" template to page attirbute template section.
 */
function wpse_288589_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

    // Add custom template named template-with-sidebar.php to select dropdown
    $post_templates['fddocs.php']          = __( 'Documentation Page' );

    return $post_templates;
}

add_filter( 'theme_page_templates', 'wpse_288589_add_template_to_select', 10, 4 );

function fddocs_feedback_html() {
    $previous    = isset( $_COOKIE['fddocs_response'] ) ? explode( ',', $_COOKIE['fddocs_response'] ) : [];
    $is_disabled = in_array( get_the_ID(), $previous ) ? 'disabled' : '';
    ob_start();?>
<div class="fddocs-footer-feedback <?php echo esc_attr( $is_disabled ) ?>">

    <span class="feedback-text"><?php esc_html_e( 'Rate this article', 'fddocs' )?></span>

    <span class="like" data-type="like" data-id="<?php the_ID()?>"><svg width="14" height="13" viewBox="0 0 14 13"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0.59375 12.5625H2.95625V5.475H0.59375V12.5625ZM13.5875 6.06562C13.5875 5.41298 13.0589 4.88437 12.4063 4.88437H8.67645L9.2405 2.18522C9.25231 2.12616 9.26117 2.06414 9.26117 1.99917C9.26117 1.75406 9.16077 1.53258 9.0013 1.37311L8.37228 0.75L4.48302 4.63927C4.27039 4.85484 4.1375 5.15016 4.1375 5.475V11.3812C4.1375 12.0339 4.66611 12.5625 5.31875 12.5625H10.6344C11.1246 12.5625 11.5439 12.2642 11.7211 11.8419L13.5019 7.67803C13.555 7.54219 13.5875 7.39748 13.5875 7.24687V6.11583L13.5816 6.10992L13.5875 6.06562Z"
                fill="white" />
        </svg>
    </span>
    <span class="dislike" data-type="dislike" data-id="<?php the_ID()?>">
        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.7451 0.4375H11.3826V7.525H13.7451V0.4375ZM0.751366 6.93438C0.751366 7.58702 1.27998 8.11562 1.93262 8.11562H5.66241L5.09837 10.8148C5.08655 10.8738 5.07769 10.9359 5.07769 11.0008C5.07769 11.2459 5.1781 11.4674 5.33757 11.6269L5.96659 12.25L9.85585 8.36073C10.0685 8.14516 10.2014 7.84984 10.2014 7.525V1.61875C10.2014 0.966109 9.67276 0.4375 9.02012 0.4375H3.70449C3.21427 0.4375 2.79493 0.735765 2.61774 1.15806L0.837007 5.32197C0.783851 5.45781 0.751366 5.60252 0.751366 5.75313V6.88417L0.757273 6.89008L0.751366 6.93438Z"
                fill="white" />
        </svg>

    </span>

</div>
<?php
return ob_get_clean();
}

function page_layout( $layout ) {

    if ( is_singular( 'docs' ) ) {
        return 'no-sidebar';
    }

    return $layout;
}

function fddocs_get_totla_article( $id = '', $in_section = false ) {
    $id = '' != $id ? $id : get_the_ID();

    $args = array(
        'post_type'      => 'docs',
        'posts_per_page' => -1,
        'post_parent'    => [$id],
        'suppress_filters' => false ,

    );

    $posts = get_posts( $args );
    // var_dump($posts);
    $counter = 0;
    // now grab the grand children

    if ( $in_section ) {

        $children = fd_get_posts_children( $id ) ? fd_get_posts_children( $id ) : [];
        $children = count( $children );
        $counter += $children;

    } else {
        $first_parents = fd_get_posts_children( $id );
        if($first_parents){
            foreach ( $first_parents as $section ) {
                $article = fd_get_posts_children($section) ? fd_get_posts_children($section) : [];
                $counter += count($article);
            }
        }

    }

    return $counter;
}


function fddoc_update_exxisting_doc_type(){

    $args = array(
        'post_type'      => 'docs',
        'posts_per_page' => -1,
    );

    // the query
    $the_query = new WP_Query( $args );

    if($the_query->have_posts()){
        while($the_query->have_posts(  )){
            $the_query->the_post();

            $idd = get_the_ID(  );
            $sec_parent = wp_get_post_parent_id( $idd );
            $type = 'doc';
            if($sec_parent){
                $third_parent = wp_get_post_parent_id( $sec_parent );
                $type = 'section';
                if($third_parent){
                    $type = 'article';
                }
            }

            update_post_meta( $idd, 'doc_type',$type );

        }
        wp_reset_query(  );
    }
}


function fddocs_redirec_section_to_article(){
    global $post;
    $first_article_id =  fd_get_posts_children(get_the_ID(  )) ? fd_get_posts_children(get_the_ID(  )) : [];
    $first_article_id = array_reverse($first_article_id);
    $doc_type = get_post_meta( get_The_ID(), 'doc_type', true );

    If ('section' == $doc_type){
        $url_to_redirect = get_the_permalink( $first_article_id[0] );
        wp_redirect( $url_to_redirect );
    }
}

add_action( 'template_redirect', 'fddocs_redirec_section_to_article' );


function fddocs_related_article($parent_id){

    $args = array(
        'post_type'      => 'docs',
        'posts_per_page' => -1,
        'post__not_in' => [get_the_ID(  )],
        'post_parent' => $parent_id
    );

    // the query
    $the_query = new WP_Query( $args );

    if($the_query->have_posts()){
        echo '<div class="fddocs-related-article-wrap">';
        echo '<h4> '.esc_html__( 'Related Articles', 'finest-docs' ).' </h4>';
        echo '<ul class="fddocs-related-articles">';
        while($the_query->have_posts(  )){
            $the_query->the_post();
            $idd = get_the_ID(  );
            $doc_type = get_post_meta( $idd,'doc_type', true);
            if('article' == $doc_type){
                $doc_icon_meta = get_post_meta( $idd, 'fd_doc_icon', true );
                $article_icon =   '<span class="dashicons dashicons-media-default"></span>';
               
                printf(
                    '<li><a href="%s">%s %s</a></li>',
                    get_the_permalink(  ),
                    $article_icon,
                    esc_html(get_the_title(  ))
                );
            }
        }
        wp_reset_query(  );

        echo '</ul>';
        echo '</div>';
    }
}