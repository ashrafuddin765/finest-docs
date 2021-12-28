<?php 
    $sidebarvalue = get_theme_mod( 'sidebar_typography', [] );
    $sidebar_width = get_theme_mod( 'sidebar_width_setting', '25%' );
    $sidebar_bgc = get_theme_mod( 'sidebar_backgound', '#F8F8FA' );
    $sidebar_padding = get_theme_mod( 'sidebar_padding' ) != ' ' ? get_theme_mod( 'sidebar_padding' ) : '' ;
    $sidebarpadding = is_array($sidebar_padding ) ?  implode(' ', $sidebar_padding) : '';
    $sidebar_radius = get_theme_mod( 'sidebar_border_radius', '0px' );
    $cate_title_color = get_theme_mod( 'cate_title_color', 'rgba(0, 0, 0, 0.4)' );
    $category_font_size = get_theme_mod( 'category_font_size', '14px' );
    $single_category_color = get_theme_mod( 'single_category_color', '#000000' );
    $single_category_hover_color = get_theme_mod( 'single_category_hover_color', '#000000' );
    $single_category_active_color = get_theme_mod( 'single_category_active_color', '#000000' );
    $single_category_margin = get_theme_mod( 'single_category_margin' ) != ' ' ? get_theme_mod( 'single_category_margin' ) : '' ;
    $singlemargin = is_array($single_category_margin ) ?  implode(' ', $single_category_margin) : '';
    
    // subcategory
    $subcate_font_size = get_theme_mod( 'subcate_font_size', '16px' );
    $sub_single_category_color = get_theme_mod( 'sub_single_category_color', 'color: rgba(0, 0, 0, 0.7)' );
    $single_category_hover_color = get_theme_mod( 'sub_category_hover_color', '#000000' );
    $sub_category_margin = get_theme_mod( 'sub_category_margin' ) != ' ' ? get_theme_mod( 'sub_category_margin' ) : '' ;
    $subsinglemargin = is_array($sub_category_margin ) ?  implode(' ', $sub_category_margin) : '';

    // icon
    $icon_font_size = get_theme_mod( 'sidebar_icon_size', '18px' );
    $icon_color = get_theme_mod( 'sidebar_icon_color', '#000000' );
    $sidebar_icon_gap = get_theme_mod( 'sidebar_icon_gap', '20px' );

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
   
    if( $cate_title_color ){
        $fmc_dynamic_css .= '.finest-sidebar .widget-title {color: ' . esc_attr( $cate_title_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $category_font_size ){
        $fmc_dynamic_css .= '.finest-sidebar ul li a {font-size: ' . esc_attr( $category_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $single_category_color ){
        $fmc_dynamic_css .= '.finest-sidebar ul li a {color: ' . esc_attr( $single_category_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $single_category_hover_color ){
        $fmc_dynamic_css .= '.finest-sidebar ul li a:hover {color: ' . esc_attr( $single_category_hover_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $single_category_active_color ){
        $fmc_dynamic_css .= '.finest-sidebar ul li.current-menu-item {color: ' . esc_attr( $single_category_active_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $singlemargin ){
        $fmc_dynamic_css .= '.finest-sidebar ul li a {margin: ' . esc_attr( $singlemargin ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    // subcategory

    if( $subcate_font_size ){
        $fmc_dynamic_css .= '.finest-sidebar ul li ul.children li a {font-size: ' . esc_attr( $subcate_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $sub_single_category_color ){
        $fmc_dynamic_css .= '.finest-sidebar ul li ul.children li a {color: ' . esc_attr( $sub_single_category_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $single_category_hover_color ){
        $fmc_dynamic_css .= '.finest-sidebar ul li ul.children li a:hover {color: ' . esc_attr( $single_category_hover_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $subsinglemargin ){
        $fmc_dynamic_css .= '.finest-sidebar ul li ul.children li a {margin: ' . esc_attr( $subsinglemargin ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    // icon 
    
    if( $icon_font_size ){
        $fmc_dynamic_css .= '.finest-sidebar ul.finest-nav-list li a span.dashicons {font-size: ' . esc_attr( $icon_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_font_size ){
        $fmc_dynamic_css .= '.finest-sidebar ul.finest-nav-list li a span.dashicons {width: ' . esc_attr( $icon_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_font_size ){
        $fmc_dynamic_css .= '.finest-sidebar ul.finest-nav-list li a span.dashicons {height: ' . esc_attr( $icon_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_font_size ){
        $fmc_dynamic_css .= '.finest-sidebar ul.finest-nav-list li a span.dashicons {line-height: ' . esc_attr( $icon_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_color ){
        $fmc_dynamic_css .= '.finest-sidebar ul.finest-nav-list li a span.dashicons {color: ' . esc_attr( $icon_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $sidebar_icon_gap ){
        $fmc_dynamic_css .= '.finest-sidebar ul.finest-nav-list li a span.dashicons {margin-right: ' . esc_attr( $sidebar_icon_gap ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
?>