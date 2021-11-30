<?php
/*
*
*  Register CSS
*
*/
function fqv_register_script(){

	// Enqueue All css
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style('slick-css', FINEST_DOCS_ASSETS_CSS . 'slick.css', array(), '2.0' );
	wp_enqueue_style('slick-theme', FINEST_DOCS_ASSETS_CSS . 'slick-theme.css', array(), '2.0' );
	wp_enqueue_style('finest-quick-view', FINEST_DOCS_ASSETS_CSS . 'quick-view.css',array(), time() );

	// Enqueue All Js file
	wp_enqueue_script('slick-min', FINEST_DOCS_ASSETS_JS . 'slick.min.js', array('jquery'), '2.0', true);
	wp_enqueue_script('finest-docs-core', FINEST_DOCS_ASSETS_JS . 'docs-core.js', array('jquery'), FINEST_DOCS_VERSION ,true);

};
add_action( 'wp_enqueue_scripts', 'fqv_register_script' );

/*
*
*  Includes
*
*/
// Load the Functions
if ( file_exists( FINEST_DOCS_INC . 'Post_types.php' ) ) {
	require_once  FINEST_DOCS_INC . 'Post_types.php';
}
require_once  FINEST_DOCS_INC . 'Admin.php';
require_once  FINEST_DOCS_INC . 'Ajax.php';
require_once  FINEST_DOCS_INC . 'Frontend.php';

// Load the Functions
if ( file_exists( FINEST_DOCS_INC . 'option-style.php' ) ) {
	require_once  FINEST_DOCS_INC . 'option-style.php';
}
// Load the Settings Options
if ( file_exists( FINEST_DOCS_INC . 'customizer/config.php' ) ) {
	require_once  FINEST_DOCS_INC . 'customizer/config.php';
}
