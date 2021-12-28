<?php
/*
Plugin Name: FinestDocs
Plugin URI: https://github.com/ashrafuddin765/finest-docs
Description: WooCommerce Quick View plugin is a simple and clean design.
Version: 1.1.0
Author: FinestWP
Author URI: http://finestdevs.com
License: GPLv2
Text Domain: finest-docs
Domain Path: /languages/
*/



if ( ! defined( 'ABSPATH' ) ) {
	die;
}

//Set plugin version constant.
define( 'FINEST_DOCS_VERSION', '1.1.0');
define( 'FINEST_PLUGIN_NAME', 'FinestDocs');
define( 'FINEST_DOCS_INC', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'FINEST_DOCS_DIR', plugin_dir_path( __FILE__ ) . '' );
define( 'FINEST_DOCS_DIR_LY', plugin_dir_path( __FILE__ ) . 'layout/' );
define( 'FINEST_DOCS_FILE', __FILE__  );
define( 'FINEST_DOCS_TEMPLATE', plugin_dir_path( __FILE__ ) . 'templates/' );
define( 'FINEST_DOCS_MAIN', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'FINEST_DOCS_ASSETS_CSS', plugins_url( 'assets/css/', __FILE__ ));
define( 'FINEST_DOCS_ASSETS_JS',  plugins_url( 'assets/js/', __FILE__ ));
define( 'FINEST_DOCS_ASSETS_ASSETS',  plugins_url( 'assets/img/', __FILE__ ));
define( 'FINEST_LIB', plugin_dir_path( __FILE__ ) . 'lib/' );






// // Load the library
// if ( file_exists( FINEST_DOCS_MAIN . 'lib/settings.php' ) ) {
// 	require_once  FINEST_DOCS_MAIN . 'lib/settings.php';
// }

// Let's Initialize Everything
if ( file_exists(  FINEST_DOCS_MAIN . 'init.php' ) ) {
	require_once(  FINEST_DOCS_MAIN . 'init.php' );
}