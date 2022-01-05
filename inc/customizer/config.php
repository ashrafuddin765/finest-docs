<?php

if (function_exists('kirki')) {

	Kirki::add_panel( 'docs_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Finest Docs', 'finest-mini-cart' ),
	) );

	// Global
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/globla.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/globla.php' );
	}

	//docs-pages
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/single-docs-page.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/single-docs-page.php' );
	}

	// sidebar
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/sidebar.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/sidebar.php' );
	}

	//search
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/search.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/search.php' );
	}

	// archive
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/archive-page.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/archive-page.php' );
	}

	// docs page
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/docs-page.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/docs-page.php' );
	}

	
	

}
