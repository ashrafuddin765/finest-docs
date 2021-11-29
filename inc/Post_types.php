<?php

/**
 * Post type class
 */
class Post_Types {

    /**
     * The post type name.
     *
     * @var string
     */
    private $post_type = 'docs';

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action( 'init', [$this, 'register_post_type'] );
        add_action( 'init', [$this, 'register_taxonomy'] );
    }

    /**
     * Register the post type.
     *
     * @return void
     */
    public function register_post_type_() {
        $labels = [
            'name'               => _x( 'Docs', 'Post Type General Name', 'finest-docs' ),
            'singular_name'      => _x( 'Doc', 'Post Type Singular Name', 'finest-docs' ),
            'menu_name'          => __( 'Documentation', 'finest-docs' ),
            'parent_item_colon'  => __( 'Parent Doc', 'finest-docs' ),
            'all_items'          => __( 'All Documentations', 'finest-docs' ),
            'view_item'          => __( 'View Documentation', 'finest-docs' ),
            'add_new_item'       => __( 'Add Documentation', 'finest-docs' ),
            'add_new'            => __( 'Add New', 'finest-docs' ),
            'edit_item'          => __( 'Edit Documentation', 'finest-docs' ),
            'update_item'        => __( 'Update Documentation', 'finest-docs' ),
            'search_items'       => __( 'Search Documentation', 'finest-docs' ),
            'not_found'          => __( 'Not documentation found', 'finest-docs' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'finest-docs' ),
        ];
        $rewrite = [
            'slug'       => 'docs',
            'with_front' => true,
            'pages'      => true,
            'feeds'      => true,
        ];
        $args = [
            'labels'              => $labels,
            'supports'            => ['title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'comments'],
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-portfolio',
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_in_rest'        => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
            'taxonomies'          => ['doc_tag'],
        ];

        register_post_type( $this->post_type, $args );
    }

    /**
     * Register doc tags taxonomy.
     *
     * @return void
     */
    public function register_taxonomy_() {
        $labels = [
            'name'                       => _x( 'Tags', 'Taxonomy General Name', 'finest-docs' ),
            'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'finest-docs' ),
            'menu_name'                  => __( 'Tags', 'finest-docs' ),
            'all_items'                  => __( 'All Tags', 'finest-docs' ),
            'parent_item'                => __( 'Parent Tag', 'finest-docs' ),
            'parent_item_colon'          => __( 'Parent Tag:', 'finest-docs' ),
            'new_item_name'              => __( 'New Tag', 'finest-docs' ),
            'add_new_item'               => __( 'Add New Item', 'finest-docs' ),
            'edit_item'                  => __( 'Edit Tag', 'finest-docs' ),
            'update_item'                => __( 'Update Tag', 'finest-docs' ),
            'view_item'                  => __( 'View Tag', 'finest-docs' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'finest-docs' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'finest-docs' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'finest-docs' ),
            'popular_items'              => __( 'Popular Tags', 'finest-docs' ),
            'search_items'               => __( 'Search Tags', 'finest-docs' ),
            'not_found'                  => __( 'Not Found', 'finest-docs' ),
            'no_terms'                   => __( 'No items', 'finest-docs' ),
            'items_list'                 => __( 'Tags list', 'finest-docs' ),
            'items_list_navigation'      => __( 'Tags list navigation', 'finest-docs' ),
        ];

        $rewrite = [
            'slug'         => 'doc-tag',
            'with_front'   => true,
            'hierarchical' => false,
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_menu'      => false,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'show_in_rest'      => true,
            'rewrite'           => $rewrite,
        ];

        register_taxonomy( 'doc_tag', ['docs'], $args );
    }

    public function register_post_type() {
        $labels = array(
            'name'               => _x( 'Docs', 'post type general name', 'finest-docs' ),
            'singular_name'      => _x( 'Docs', 'post type singular name', 'finest-docs' ),
            'menu_name'          => _x( 'Docs', 'admin menu', 'finest-docs' ),
            'name_admin_bar'     => _x( 'Docs', 'add new on admin bar', 'finest-docs' ),
            'add_new'            => __( 'Add New Docs', 'finest-docs' ),
            'add_new_item'       => __( 'Add New Docs', 'finest-docs' ),
            'new_item'           => __( 'New Docs', 'finest-docs' ),
            'edit_item'          => __( 'Edit Docs', 'finest-docs' ),
            'view_item'          => __( 'View Docs', 'finest-docs' ),
            'all_items'          => __( 'All Docs', 'finest-docs' ),
            'search_items'       => __( 'Search Docs', 'finest-docs' ),
            'parent_item_colon'  => __( 'Parent :', 'finest-docs' ),
            'not_found'          => __( 'No portfolios found.', 'finest-docs' ),
            'not_found_in_trash' => __( 'No portfolios found in Trash.', 'finest-docs' ),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'finest-docs' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'query_var'          => true,
            'menu_icon'          => 'dashicons-format-gallery',
            'rewrite'            => array( 'slug' => 'portfolio', 'with_front' => true, 'pages' => true, 'feeds' => true ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array( 'title', 'elementor', 'editor', 'thumbnail', 'page-attributes' ),
        );
        register_post_type( 'finest-docs', $args );
    }
    public function register_taxonomy() {
        $labels = array(
            'name'              => _x( 'Tags', 'taxonomy general name', 'finest-docs' ),
            'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'finest-docs' ),
            'search_items'      => __( 'Search Tags', 'finest-docs' ),
            'all_items'         => __( 'All Tags', 'finest-docs' ),
            'parent_item'       => __( 'Parent Tag', 'finest-docs' ),
            'parent_item_colon' => __( 'Parent Tag:', 'finest-docs' ),
            'edit_item'         => __( 'Edit Tag', 'finest-docs' ),
            'update_item'       => __( 'Update Tag', 'finest-docs' ),
            'add_new_item'      => __( 'Add New Tag', 'finest-docs' ),
            'new_item_name'     => __( 'New Tag Name', 'finest-docs' ),
            'menu_name'         => __( 'Tag', 'finest-docs' ),
        );

        $args = [
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'doc-tag' ),
        ];

        register_taxonomy( 'doc-tag', array( 'finest-docs' ), $args );
    }
}
$post_type = new Post_Types();
