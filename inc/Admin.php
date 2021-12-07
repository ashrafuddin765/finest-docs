<?php
class Admin {
    function __construct() {

        add_action( 'admin_menu', [$this, 'admin_menu'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_scripts'] );

    }

    public function admin_scripts( $hook ) {
        if ( 'toplevel_page_finest-docs' != $hook ) {

            return;

        }
        wp_enqueue_style( 'admin-style', FINEST_DOCS_ASSETS_CSS . 'admin.css' );

        wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], time(), true );
        wp_enqueue_script( 'sweetalert', FINEST_DOCS_ASSETS_JS . 'sweetalert.min.js', ['jquery'], time(), true );
        wp_enqueue_script( 'finestdocs-frontentd-script', FINEST_DOCS_ASSETS_JS . 'frontend.js', ['jquery', 'jquery-ui-sortable', 'wp-util'], time(), true );
        wp_enqueue_script( 'finestdocs-admin-script', FINEST_DOCS_ASSETS_JS . 'admin-script.js', ['jquery', 'jquery-ui-sortable', 'wp-util'], time(), true );
        wp_localize_script( 'finestdocs-admin-script', 'finestDocs', [
            'nonce'               => wp_create_nonce( 'finestdocs-admin-nonce' ),
            'editurl'             => admin_url( 'post.php?action=edit&post=' ),
            'viewurl'             => home_url( '/?p=' ),
            'enter_doc_title'     => __( 'Enter doc title', 'finestdocs' ),
            'write_something'     => __( 'Write something', 'finestdocs' ),
            'enter_section_title' => __( 'Enter section title', 'finestdocs' ),
            'confirmBtn'          => __( 'OK', 'finestdocs' ),
            'delConfirmBtn'       => __( 'Yes, delete it!', 'finestdocs' ),
            'cancelBtn'           => __( 'Cancel', 'finestdocs' ),
            'delConfirm'          => __( 'Are you sure?', 'finestdocs' ),
            'delConfirmTxt'       => __( 'Are you sure to delete the entire section? Articles inside this section will be deleted too!', 'finestdocs' ),
        ] );

    }

    public function admin_menu() {
        global $sdk_license;
            add_menu_page( __( 'FinestDocs', 'finest-docs' ), __( 'Finestdocs', 'finest-docs' ), 'manage_options', 'finest-docs', [$this, 'page_index'], 'dashicons-media-document', 48 );

            add_submenu_page( 'finest-docs', __( 'Docs', 'finest-docs' ), __( 'Docs', 'finest-docs' ), 'manage_options', 'finest-docs', [$this, 'page_index'] );
            add_submenu_page( 'finest-docs', __( 'Tags', 'finest-docs' ), __( 'Tags', 'finest-docs' ), 'manage_categories', 'edit-tags.php?taxonomy=doc-tag&post_type=finest-docs' );
            $sdk_license->create_license_menu('finest-docs');

    }

    public function page_index() {
        include 'view/admin.php';
    }

}
$admin = new Admin();