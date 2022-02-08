<?php
/*
 *
 *  Register CSS
 *
 */

use Finestics\Insights;

function fqv_register_script() {

    wp_enqueue_style( 'fddocs-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600', false );
    // Enqueue All css
    wp_enqueue_style( 'fddocs-grid', FINEST_DOCS_ASSETS_CSS . 'grid-css.css', array(), time() );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'fddocs-quick-view', FINEST_DOCS_ASSETS_CSS . 'frontend.css', array(), time() );
    
    // Enqueue All Js file
    
    wp_enqueue_script( 'jquery-masonry' );
    wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], time(), true );
    wp_enqueue_script( 'fddocs-docs-core', FINEST_DOCS_ASSETS_JS . 'finest-docs.js', array( 'jquery' ), FINEST_DOCS_VERSION, true );
    wp_enqueue_script( 'fddocs-ia', FINEST_DOCS_ASSETS_JS . 'ia.js', array( 'vue', 'fddocs-docs-core' ), FINEST_DOCS_VERSION, true );



    wp_localize_script( 'fddocs-docs-core', 'fddocs_vars', [
        'nonce'   => wp_create_nonce( 'fddocs-nonce' ),
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ] );
};
add_action( 'wp_enqueue_scripts', 'fqv_register_script' );

/*
 *
 *  Includes
 *
 */
// Load the Functions
require_once FINEST_DOCS_INC . 'license.php';

$sdk_license = FinestDocs\License::init(
    'FinestDocs', // The plugin name is used to manage internationalization
    'https://grayic.com/plugintest', //Replace with the URL of your license server (without the trailing slash)
    'ck_c293e33b48c85dd9ddef489a5d88adbb19f39108', //Customer key created in the license server
    'cs_dcc061ded98d6817909ea261b468af7f351189c1', //Customer secret created in the license server
    [], //Set an array of the products IDs on your license server (if no product validation is needed, send an empty array)
    'fddocs_license', //Set a unique value to avoid conflict with other plugins
    'fddocs-valid', //Set a unique value to avoid conflict with other plugins
    5//How many days the valid object will be used before calling the license server
);

global $sdk_license;

require_once FINEST_DOCS_INC . 'Finestics/Client.php';
require_once FINEST_DOCS_INC . 'functions.php';
require_once FINEST_DOCS_INC . 'Walker/Finest_Walker.php';
if ( file_exists( FINEST_DOCS_INC . 'Post_types.php' ) ) {
    require_once FINEST_DOCS_INC . 'Post_types.php';
}
require_once FINEST_DOCS_INC . 'Admin/Admin.php';
require_once FINEST_DOCS_INC . 'Metabox.php';
require_once FINEST_DOCS_INC . 'Admin/Ajax.php';
require_once FINEST_DOCS_INC . 'Ajax.php';
require_once FINEST_DOCS_INC . 'Manager.php';
require_once FINEST_DOCS_INC . 'shortcode.php';
require_once FINEST_DOCS_INC . 'Widgets.php';

// Load the Functions
if ( file_exists( FINEST_DOCS_INC . 'option-style.php' ) ) {
    require_once FINEST_DOCS_INC . 'option-style.php';
}

if ( file_exists( FINEST_LIB . 'settings.php' ) ) {
    require_once FINEST_LIB . 'settings.php';
}

// Load the Settings Options
if ( file_exists( FINEST_DOCS_INC . 'customizer/config.php' ) ) {
    require_once FINEST_DOCS_INC . 'customizer/config.php';
}

$init_finestics = new Finestics\Client( 'FinestDocs', 'FinestDocs', FINEST_DOCS_FILE );
$init_finestics->insights()->init();

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'Widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

function cc_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg_thumb_display() {
    echo '
	<style>
	td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
		width: 100% !important;
		height: auto !important;
	  }
	</style>
	';
}
add_action( 'admin_head', 'fix_svg_thumb_display' );
