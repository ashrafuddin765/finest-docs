<?php 

    $docs_width = get_theme_mod( 'docs_page_width', '75%' );
    $docs_bgc = get_theme_mod( 'content_area_backgound', '#ffffff' );
    $docs_padding = get_theme_mod( 'docs_padding' ) != ' ' ? get_theme_mod( 'docs_padding' ) : '' ;
    $docspadding = is_array($docs_padding ) ?  implode(' ', $docs_padding) : '';
    $docs_radius = get_theme_mod( 'content_area_radius', '0px' );


    if($docs_width){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content { width:' . esc_attr( $docs_width ) .'% } ';
        $fmc_dynamic_css .= "\n";
    }
    if($docs_bgc){
        $fmc_dynamic_css .= '.ast-separate-container .finest-docs.ast-article-single:not(.ast-related-post) { background-color:' . esc_attr( $docs_bgc ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $docspadding ){
        $fmc_dynamic_css .= '.ast-separate-container .finest-docs.ast-article-single:not(.ast-related-post) {padding: ' . esc_attr( $docspadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $docs_radius ){
        $fmc_dynamic_css .= '.ast-separate-container .finest-docs.ast-article-single:not(.ast-related-post) {border-radius: ' . esc_attr( $docs_radius ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }


?>