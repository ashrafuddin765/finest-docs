<?php
class Admin {
    function __construct() {

        add_action( 'admin_menu', [$this, 'admin_menu'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_scripts'] );

    }

    public function admin_scripts( $hook ) {

        if ( 'toplevel_page_finest-docs' != $hook && 'finestdocs_page_fddocs-settings' != $hook ) {

            return;

        }
        

        wp_enqueue_script('jquery-ui-core');// enqueue jQuery UI Core
        wp_enqueue_script('jquery-ui-tabs');// enqueue jQuery UI Tabs

        wp_enqueue_style( 'admin-style', FINEST_DOCS_ASSETS_CSS . 'admin.css' );

        wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], time(), true );
        wp_enqueue_script( 'sweetalert', FINEST_DOCS_ASSETS_JS . 'sweetalert.min.js', ['jquery'], time(), true );
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'fddocs-frontentd-script', FINEST_DOCS_ASSETS_JS . 'finest-docs.js', ['jquery', 'jquery-ui-sortable', 'wp-util'], time(), true );
        wp_enqueue_script( 'fddocs-admin-script', FINEST_DOCS_ASSETS_JS . 'admin-script.js', ['jquery', 'jquery-ui-sortable', 'wp-util'], time(), true );
        wp_localize_script( 'fddocs-admin-script', 'finestDocs', [
            'nonce'               => wp_create_nonce( 'fddocs-admin-nonce' ),
            'editurl'             => admin_url( 'post.php?action=edit&post=' ),
            'viewurl'             => home_url( '/?p=' ),
            'enter_doc_title'     => __( 'Enter doc title', 'fddocs' ),
            'write_something'     => __( 'Write something', 'fddocs' ),
            'enter_section_title' => __( 'Enter section title', 'fddocs' ),
            'confirmBtn'          => __( 'OK', 'fddocs' ),
            'delConfirmBtn'       => __( 'Yes, delete it!', 'fddocs' ),
            'cancelBtn'           => __( 'Cancel', 'fddocs' ),
            'delConfirm'          => __( 'Are you sure?', 'fddocs' ),
            'delConfirmTxt'       => __( 'Are you sure to delete the entire section? Articles inside this section will be deleted too!', 'fddocs' ),
        ] );

    }

    public function admin_menu() {
        global $sdk_license;
        add_menu_page( __( 'FinestDocs', 'finest-docs' ), __( 'Finestdocs', 'finest-docs' ), 'manage_options', 'finest-docs', [$this, 'doc_page'], 'dashicons-media-document', 48 );

        add_submenu_page( 'finest-docs', __( 'Docs', 'finest-docs' ), __( 'Docs', 'finest-docs' ), 'manage_options', 'finest-docs', [$this, 'doc_page'] );

        add_submenu_page( 'finest-docs', __( 'Tags', 'finest-docs' ), __( 'Tags', 'finest-docs' ), 'manage_categories', 'edit-tags.php?taxonomy=doc-tag&post_type=finest-docs' );

        add_submenu_page( 'finest-docs', __( 'Settings', 'finest-docs' ), __( 'Settings', 'finest-docs' ), 'manage_options', 'fddocs-settings', [$this, 'settings_page'] );

        $sdk_license->create_license_menu( 'finest-docs' );

    }

    public function doc_page() {
        include 'view/admin.php';
    }
    public function settings_page() {
        include 'view/settings.php';
    }

}
$admin = new Admin();