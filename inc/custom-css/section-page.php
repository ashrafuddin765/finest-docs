<?php 
    $section_bg_area = get_theme_mod( 'section_area_backgound', '#ffffff' );
    $section_border = get_theme_mod( 'section_border_setting', '' );
    $section_border_type = get_theme_mod( 'section_border_type', 'solid' );
    $section_border_color = get_theme_mod( 'section_border_color', 'rgba(45, 45, 49, 0.12)' );
    $section_border_radius = get_theme_mod( 'section_border_radius', '5px' );
    $content_section_padding = get_theme_mod( 'archive_area_padding' ) != ' ' ? get_theme_mod( 'archive_area_padding' ) : '' ;
    $sectionpadding = is_array($content_section_padding ) ?  implode(' ', $content_section_padding) : '';











    if ( $section_bg_area) {
        $fmc_dynamic_css .= '.finest-site-main .wraper { background-color:' . esc_attr( $section_bg_area ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-top: ' . esc_attr( $section_border['top-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-right: ' . esc_attr( $section_border['right-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-bottom: ' . esc_attr( $section_border['bottom-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-left: ' . esc_attr( $section_border['left-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border_type ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-style: ' . esc_attr( $section_border_type ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border_color ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-color: ' . esc_attr( $section_border_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border_radius ){
        $fmc_dynamic_css .= '.finest-site-main .wraper {border-radius: ' . esc_attr( $section_border_radius ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $docspadding ){
        $fmc_dynamic_css .= '.finest-site-main {padding: ' . esc_attr( $docspadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }