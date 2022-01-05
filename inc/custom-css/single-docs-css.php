<?php 

    $content_bg_color = get_theme_mod( 'doc_area_backgound', '#F3F5F7' );
    $content_padding = get_theme_mod( 'content_padding' ) != ' ' ? get_theme_mod( 'content_padding' ) : '' ;
    $contentpadding = is_array($content_padding ) ?  implode(' ', $content_padding) : '';

    $docs_width = get_theme_mod( 'single_page_width', '50%' );
    $docs_bgc = get_theme_mod( 'content_area_backgound', '#ffffff' );
    $docs_padding = get_theme_mod( 'docs_padding' ) != ' ' ? get_theme_mod( 'docs_padding' ) : '' ;
    $docspadding = is_array($docs_padding ) ?  implode(' ', $docs_padding) : '';
    // post ttile
    $ptitle_font_size = get_theme_mod( 'post_title_font_size', '28px' );
    $ptitle_color = get_theme_mod( 'post_title_color', '#000000' );
    $post_title_margin = get_theme_mod( 'post_title_title_margin', '15px' );
    
    // description
    $desc_font_size = get_theme_mod( 'entry_font_size', '16px' );
    $postdesc_color = get_theme_mod( 'content_desc_color', 'rgba(0, 0, 0, 0.7)' );
    $entry_margin_bottom = get_theme_mod( 'entry_margin_bottom', '35px' );
   
    // breadcamp
    $brand_font_size = get_theme_mod( 'bradcrumb_font_size', '15px' );
    $bread_font_color = get_theme_mod( 'bread_font_color', 'rgba(22, 22, 23, 0.6)' );
    $hover_bread_color = get_theme_mod( 'hover_bread_color', '#000000' );
    $active_bread_color = get_theme_mod( 'active_bread_color', '#000000' );
    $icon_bread_color = get_theme_mod( 'icon_bread_color', '#111827' );
    $bread_icon_size = get_theme_mod( 'bread_icon_size', '13px' );
    $bread_margin_bottom = get_theme_mod( 'bradcrumb_margin', '25px' );

    //table of contents
    $docs_table_width = get_theme_mod( 'docs_table_width', '25%' );
    $table_area_backgound = get_theme_mod( 'table_area_backgound', '#ffffff' );
    $docs_table_padding = get_theme_mod( 'docs_table_padding' ) != ' ' ? get_theme_mod( 'docs_table_padding' ) : '' ;
    $tablepadding = is_array($docs_table_padding ) ?  implode(' ', $docs_table_padding) : '';
    $table_content_radius = get_theme_mod( 'table_content_radius', '0px' );

    $toc_title_color = get_theme_mod( 'toc_title_color', 'rgba(0, 0, 0, 0.4)' );
    $toc_title_font_size = get_theme_mod( 'toc_title_font_size', '13px' );
    $toc_title_bottom = get_theme_mod( 'toc_title_bottom', '10px' );

     //table content title
     $table_title_size = get_theme_mod( 'table_title_font_size', '18px' );
     $table_title_color = get_theme_mod( 'table_title_color', '#000000' );
     $table_title_hover = get_theme_mod( 'table_title_hover_color', '#000000' );
     $table_title_gap = get_theme_mod( 'table_title_margin_bottom', '15px' );


    if ( $content_bg_color) {
        $fmc_dynamic_css .= '.finest-single-wrap  { background-color:' . esc_attr( $content_bg_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $contentpadding ){
        $fmc_dynamic_css .= '.finest-single-wrap {padding: ' . esc_attr( $contentpadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if($docs_width){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content { width:' . esc_attr( $docs_width ) .'% } ';
        $fmc_dynamic_css .= "\n";
    }
   
    if($docs_bgc){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content { background-color:' . esc_attr( $docs_bgc ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $docspadding ){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content {padding: ' . esc_attr( $docspadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    
    if( $ptitle_font_size ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content h2 {font-size: ' . esc_attr( $ptitle_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $ptitle_color ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content h2 {color: ' . esc_attr( $ptitle_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $post_title_margin ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content h2 {margin-bottom: ' . esc_attr( $post_title_margin ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    
    if( $desc_font_size ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content p {font-size: ' . esc_attr( $desc_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $postdesc_color ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content p {color: ' . esc_attr( $postdesc_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $entry_margin_bottom ){
        $fmc_dynamic_css .= '.finest-single-content .entry-content p {margin-bottom: ' . esc_attr( $entry_margin_bottom ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }

    // Bradcamp

    if( $brand_font_size ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li a,
        .finest-single-content ul.finest-breadcrumb li .current {font-size: ' . esc_attr( $brand_font_size ) . ' } ';
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

    if( $brand_font_size ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li span.dashicons {font-size: ' . esc_attr( $brand_font_size ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_bread_color ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li span.dashicons {color: ' . esc_attr( $icon_bread_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_bread_color ){
        $fmc_dynamic_css .= '.finest-single-content ul.finest-breadcrumb li span.dashicons {color: ' . esc_attr( $icon_bread_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $bread_margin_bottom ){
        $fmc_dynamic_css .= '.finest-single-wrap .finest-single-content ul.finest-breadcrumb {margin-bottom: ' . esc_attr( $bread_margin_bottom ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }

    // Toc area

    if($docs_table_width){
        $fmc_dynamic_css .= '.finest-autoc-wrap { width:' . esc_attr( $docs_table_width ) .'% } ';
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
        $fmc_dynamic_css .= '.finest-autoc-wrap {border-radius: ' . esc_attr( $table_content_radius ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }
    
    if( $toc_title_color ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc h2 {color: ' . esc_attr( $toc_title_color ) . '} ';
        $fmc_dynamic_css .= "\n";
    }

    if( $toc_title_font_size ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc h2 {font-size: ' . esc_attr( $toc_title_font_size ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $toc_title_bottom ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc h2 {margin-bottom: ' . esc_attr( $toc_title_bottom ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $table_title_size ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc ul li a {font-size: ' . esc_attr( $table_title_size ) . 'px } ';
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
    
    if( $table_title_gap ){
        $fmc_dynamic_css .= '.finest-autoc-wrap .autoc ul li {padding-bottom: ' . esc_attr( $table_title_gap ) . 'px } ';
        $fmc_dynamic_css .= "\n";
    }



?>