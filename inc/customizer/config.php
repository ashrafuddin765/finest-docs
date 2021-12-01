<?php

if (function_exists('kirki')) {

	Kirki::add_panel( 'docs_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Finest Docs', 'finest-mini-cart' ),
	) );
	if ( file_exists(  FINEST_DOCS_INC . 'customizer/general_settings.php' ) ) {
		require_once(  FINEST_DOCS_INC . 'customizer/general_settings.php' );
	}

}
