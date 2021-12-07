<?php 

    $sidebar_width = get_theme_mod( 'sidebar_width_setting', '25%' );
    $sidebar_bgc = get_theme_mod( 'sidebar_backgound', '#F8F8FA' );
    $sidebar_padding = get_theme_mod( 'sidebar_padding' ) != ' ' ? get_theme_mod( 'sidebar_padding' ) : '' ;
    $sidebarpadding = is_array($sidebar_padding ) ?  implode(' ', $sidebar_padding) : '';
    $sidebar_radius = get_theme_mod( 'sidebar_border_radius', '0px' );


    if($sidebar_width){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-sidebar { width:' . esc_attr( $sidebar_width ) .'% } ';
        $fmc_dynamic_css .= "\n";
    }
    if($sidebar_bgc){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-sidebar { background-color:' . esc_attr( $sidebar_bgc ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $sidebarpadding ){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-sidebar {padding: ' . esc_attr( $sidebarpadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $sidebar_radius ){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-sidebar {border-radius: ' . esc_attr( $sidebar_radius ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }


?>