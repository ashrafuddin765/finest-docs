<?php

    $docs_content_width = get_theme_mod( 'docs_page_width', '1300px' );
    $fddoc_body_bg_color = get_theme_mod( 'fddoc_body_bg_color', '#ffffff' );
    $fddoc_body_color = get_theme_mod( 'body_primary_color', 'rgba(0, 0, 0, 0.7)' );
    $fddoc_body_font = get_theme_mod( 'fddoc_typhography', [] );

    if( isset( $fddoc_body_font['font-family'] ) ){
        $fmc_dynamic_css .= '.finest-container {font-family:' . esc_attr( $fddoc_body_font['font-family'] ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( isset( $fddoc_body_font['variant'] ) ){
        $fmc_dynamic_css .= '.finest-container { font-weight:' . esc_attr( $fddoc_body_font['variant'] ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( isset( $fddoc_body_font['font-size'] ) ){
        $fmc_dynamic_css .= '.finest-container { font-size:' . esc_attr( $fddoc_body_font['font-size'] ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( isset( $fddoc_body_font['line-height'] ) ){
        $fmc_dynamic_css .= '.finest-container { line-height:' . esc_attr( $fddoc_body_font['line-height'] ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( isset( $fddoc_body_font['text-transform'] ) ){
        $fmc_dynamic_css .= '.finest-container { text-transform:' . esc_attr( $fddoc_body_font['text-transform'] ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if($docs_content_width){
        $fmc_dynamic_css .= '.finest-container { max-width:' . esc_attr( $docs_content_width ) .'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if($fddoc_body_bg_color){
        $fmc_dynamic_css .= 'body.finest-body { background-color:' . esc_attr( $fddoc_body_bg_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if($fddoc_body_color){
        $fmc_dynamic_css .= 'body.finest-body { color:' . esc_attr( $fddoc_body_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

?>