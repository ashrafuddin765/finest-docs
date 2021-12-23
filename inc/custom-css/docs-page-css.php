<?php 

    $docs_width = get_theme_mod( 'docs_page_width', '50%' );
    $docs_bgc = get_theme_mod( 'content_area_backgound', '#ffffff' );
    $docs_padding = get_theme_mod( 'docs_padding' ) != ' ' ? get_theme_mod( 'docs_padding' ) : '' ;
    $docspadding = is_array($docs_padding ) ?  implode(' ', $docs_padding) : '';
    // post ttile
    $ptitle_font_size = get_theme_mod( 'title_font_size', '28px' );
    $ptitle_color = get_theme_mod( 'post_title_color', '#000000' );
    $ptitle_margin = get_theme_mod( 'post_title_margin' ) != ' ' ? get_theme_mod( 'post_title_margin' ) : '' ;
    $posttielmargin = is_array($ptitle_margin ) ?  implode(' ', $ptitle_margin) : '';
    // post ttile
    $pdesc_font_size = get_theme_mod( 'desc_font_size', '16px' );
    $postdesc_color = get_theme_mod( 'content_desc_color', '#000000' );
    $pdesc_margin = get_theme_mod( 'desc_content_margin' ) != ' ' ? get_theme_mod( 'desc_content_margin' ) : '' ;
    $pdescmargin = is_array($pdesc_margin ) ?  implode(' ', $pdesc_margin) : '';
    // breadcamp
    $bread_font_size = get_theme_mod( 'bread_font_size', '14px' );
    $bread_font_color = get_theme_mod( 'bread_font_color', '#000000' );
    $hover_bread_color = get_theme_mod( 'hover_bread_color', '#000000' );
    $active_bread_color = get_theme_mod( 'active_bread_color', '#000000' );
    $icon_bread_color = get_theme_mod( 'icon_bread_color', '#000000' );
    $bread_icon_size = get_theme_mod( 'bread_icon_size', '18px' );

    //table of contents
    $docs_table_width = get_theme_mod( 'docs_table_width', '25%' );
    $table_area_backgound = get_theme_mod( 'table_area_backgound', '#ffffff' );
    $docs_table_padding = get_theme_mod( 'docs_table_padding' ) != ' ' ? get_theme_mod( 'docs_table_padding' ) : '' ;
    $tablepadding = is_array($docs_table_padding ) ?  implode(' ', $docs_table_padding) : '';
    $table_content_radius = get_theme_mod( 'table_content_radius', '0px' );

     //table content title
     $table_title_font_size = get_theme_mod( 'table_title_font_size', '18px' );
     $table_title_color = get_theme_mod( 'table_title_color', '#000000' );
     $table_title_hover = get_theme_mod( 'table_title_hover_color', '#000000' );
     $table_table_margin = get_theme_mod( 'table_title_margin' ) != ' ' ? get_theme_mod( 'table_title_margin' ) : '' ;
     $table_margin = is_array($table_table_margin ) ?  implode(' ', $table_table_margin) : '';

    if($docs_width){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content { width:' . esc_attr( $docs_width ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if($docs_bgc){
        $fmc_dynamic_css .= ' { background-color:' . esc_attr( $docs_bgc ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $docspadding ){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content {padding: ' . esc_attr( $docspadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $ptitle_font_size ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content h2 {font-size: ' . esc_attr( $ptitle_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $ptitle_color ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content h2 {color: ' . esc_attr( $ptitle_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $posttielmargin ){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content h2 {margin: ' . esc_attr( $posttielmargin ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $pdesc_font_size ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content p {font-size: ' . esc_attr( $pdesc_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $postdesc_color ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content p {color: ' . esc_attr( $postdesc_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $pdescmargin ){
        $fmc_dynamic_css .= '.finest-single-wrap .entry-content p {margin: ' . esc_attr( $pdescmargin ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $bread_font_size ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li a,.finest-single-content ul.finest-breadcrumb li .current {font-size: ' . esc_attr( $bread_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $bread_font_color ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li a {color: ' . esc_attr( $bread_font_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $hover_bread_color ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li a:hover {color: ' . esc_attr( $hover_bread_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $active_bread_color ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li .current {color: ' . esc_attr( $active_bread_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_bread_color ){
        $fmc_dynamic_css .= 'ul.finest-breadcrumb li .dashicons {color: ' . esc_attr( $icon_bread_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $bread_icon_size ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li .current {font-size: ' . esc_attr( $bread_icon_size ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if($docs_table_width){
        $fmc_dynamic_css .= '.finest-autoc-wrap { width:' . esc_attr( $docs_table_width ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if($table_area_backgound){
        $fmc_dynamic_css .= '.finest-autoc-wrap{ background-color:' . esc_attr( $table_area_backgound ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $tablepadding ){
        $fmc_dynamic_css .= '.finest-autoc-wrap {padding: ' . esc_attr( $tablepadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $table_content_radius ){
        $fmc_dynamic_css .= '.finest-autoc-wrap {border-radius: ' . esc_attr( $table_content_radius ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
   
    if( $table_title_font_size ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc ul li a {font-size: ' . esc_attr( $table_title_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $table_title_color ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc ul li a {color: ' . esc_attr( $table_title_color ) . '} ';
        $fmc_dynamic_css .= "\n";
    }
    if( $table_title_hover ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc ul li a:hover {color: ' . esc_attr( $table_title_hover ) . '} ';
        $fmc_dynamic_css .= "\n";
    }
    if( $table_margin ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc ul li a {margin: ' . esc_attr( $table_margin ) . '} ';
        $fmc_dynamic_css .= "\n";
    }


?>