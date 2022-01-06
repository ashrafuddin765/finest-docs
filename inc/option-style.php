<?php
function fmc_options_scripts(){


    wp_enqueue_style('finest-quick-view', FINEST_DOCS_ASSETS_CSS . 'frontend.css',array(), FINEST_DOCS_VERSION );
    

   $fmc_dynamic_css  = '';
 
   if ( file_exists(  FINEST_DOCS_INC . 'custom-css/sidebar-css.php' ) ) {
        require_once(  FINEST_DOCS_INC . 'custom-css/sidebar-css.php' );
    };

    if ( file_exists( FINEST_DOCS_INC . 'custom-css/single-docs-css.php' ) ) {
       require_once ( FINEST_DOCS_INC . 'custom-css/single-docs-css.php' );
    }

    if ( file_exists( FINEST_DOCS_INC . 'custom-css/docs-page.php' ) ) {
       require_once ( FINEST_DOCS_INC . 'custom-css/docs-page.php' );
    }
    if ( file_exists( FINEST_DOCS_INC . 'custom-css/section-page.php' ) ) {
       require_once ( FINEST_DOCS_INC . 'custom-css/section-page.php' );
    }
    if ( file_exists( FINEST_DOCS_INC . 'custom-css/search.php' ) ) {
       require_once ( FINEST_DOCS_INC . 'custom-css/search.php' );
    }

    $fmc_dynamic_css = fddocs_css_strip_whitespace( $fmc_dynamic_css );
	wp_add_inline_style( 'finest-quick-view', $fmc_dynamic_css );

}
add_action( 'wp_enqueue_scripts', 'fmc_options_scripts', 5 );