<?php
/*
*
*  Register CSS
*
*/
function fqv_register_script(){

	// Enqueue All css
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style('finest-quick-view', FINEST_DOCS_ASSETS_CSS . 'frontend.css',array(), time() );

	// Enqueue All Js file
	
	wp_enqueue_script('finest-docs-core', FINEST_DOCS_ASSETS_JS . 'finest-docs.js', array('jquery'), FINEST_DOCS_VERSION ,true);

};
add_action( 'wp_enqueue_scripts', 'fqv_register_script' );

/*
*
*  Includes
*
*/
// Load the Functions
require_once  FINEST_DOCS_INC . 'license.php';

$sdk_license = new FinestDevs\License( 
	'FinestDocs',   // The plugin name is used to manage internationalization
	'https://grayic.com/plugintest', //Replace with the URL of your license server (without the trailing slash)
	'ck_c293e33b48c85dd9ddef489a5d88adbb19f39108', //Customer key created in the license server
	'cs_dcc061ded98d6817909ea261b468af7f351189c1', //Customer secret created in the license server
	[], //Set an array of the products IDs on your license server (if no product validation is needed, send an empty array)
	'finestdocs_license', //Set a unique value to avoid conflict with other plugins
	'finestdocs-valid',  //Set a unique value to avoid conflict with other plugins
	5 //How many days the valid object will be used before calling the license server
   );

global $sdk_license;




require_once  FINEST_DOCS_INC . 'functions.php';
if ( file_exists( FINEST_DOCS_INC . 'Post_types.php' ) ) {
	require_once  FINEST_DOCS_INC . 'Post_types.php';
}
require_once  FINEST_DOCS_INC . 'Admin.php';
require_once  FINEST_DOCS_INC . 'Admin.php';
require_once  FINEST_DOCS_INC . 'Ajax.php';
require_once  FINEST_DOCS_INC . 'Frontend.php';
require_once  FINEST_DOCS_INC . 'shortcode.php';
require_once  FINEST_DOCS_INC . 'Widgets.php';

// Load the Functions
if ( file_exists( FINEST_DOCS_INC . 'option-style.php' ) ) {
	require_once  FINEST_DOCS_INC . 'option-style.php';
}

if ( file_exists( FINEST_LIB . 'settings.php' ) ) {
	require_once  FINEST_LIB . 'settings.php';
}

// Load the Settings Options
if ( file_exists( FINEST_DOCS_INC . 'customizer/config.php' ) ) {
	require_once  FINEST_DOCS_INC . 'customizer/config.php';
}



// Register and load the widget
function wpb_load_widget() {
    register_widget( 'Widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
