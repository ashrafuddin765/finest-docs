<?php

    $docs_content_width = get_theme_mod( 'docs_page_width', '1300px' );

    if($docs_content_width){
        $fmc_dynamic_css .= '.finest-container { max-width:' . esc_attr( $docs_content_width ) .'px } ';
        $fmc_dynamic_css .= "\n";
    }

?>