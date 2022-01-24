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


    public function register_post_type() {
        $slug = fddocs_get_option('docs_root_slug', 'docs');
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
            'not_found'          => __( 'No docs found.', 'finest-docs' ),
            'not_found_in_trash' => __( 'No docs found in Trash.', 'finest-docs' ),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'finest-docs' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'show_in_admin_bar'  => true,
            'query_var'          => true,
            'menu_icon'          => 'dashicons-format-gallery',
            'rewrite'            => array( 'slug' => $slug, 'with_front' => true, 'pages' => true, 'feeds' => true ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array( 'title', 'elementor', 'editor', 'thumbnail', 'attributes' ),
        );
        register_post_type( 'docs', $args );
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

        register_taxonomy( 'doc-tag', array( 'docs' ), $args );
    }
}
$post_type = new Post_Types();
