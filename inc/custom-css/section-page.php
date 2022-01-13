<?php 
    $section_bg_area = get_theme_mod( 'section_area_backgound', '#ffffff' );
    $section_border = get_theme_mod( 'section_border_setting', '' );
    $section_border_type = get_theme_mod( 'section_border_type', 'solid' );
    $section_border_color = get_theme_mod( 'section_border_color', 'rgba(45, 45, 49, 0.12)' );
    $section_border_radius = get_theme_mod( 'section_border_radius', '5px' );
    $content_section_padding = get_theme_mod( 'archive_area_padding' ) != ' ' ? get_theme_mod( 'archive_area_padding' ) : '' ;
    $sectionpadding = is_array($content_section_padding ) ?  implode(' ', $content_section_padding) : '';

    // thumbnail 
    $section_thum_width = get_theme_mod( 'section_thumbnail_width', '100%' );
    $section_thum_height = get_theme_mod( 'section_thumbnail_height', '188px' );
    $section_thum_bg = get_theme_mod( 'thum_area_backgound', '#F3F2F8' );
    $icon_bg_width = get_theme_mod( 'icon_bg_width', '90px' );
    $icon_bg_height = get_theme_mod( 'icon_bg_height', '90px' );
    $icon_bg_color = get_theme_mod( 'icon_area_backgound', '#FFFFFF' );
    $icon_bdr_setting = get_theme_mod( 'icon_border_setting', '' );
    $icob_border_type = get_theme_mod( 'icob_border_type', 'solid' );
    $icon_border_color = get_theme_mod( 'icon_border_color', 'rgba(45, 45, 49, 0.12)' );
    $icon_border_radius = get_theme_mod( 'icon_border_radius', '50px' );

    // total article
    $section_content_bg = get_theme_mod( 'section_content_bg', '#ffffff' );
    $section_content_padding = get_theme_mod( 'doc_sec_content_padding' ) != ' ' ? get_theme_mod( 'doc_sec_content_padding' ) : '' ;
    $sectionconpadding = is_array($section_content_padding ) ?  implode(' ', $section_content_padding) : '';

    $sec_title_font_size = get_theme_mod( 'archive_title_font_size', '21px' );
    $sec_title_color = get_theme_mod( 'section_title_color', '#161617' );
    $sec_title_gap = get_theme_mod( 'section_title_gap', '10px' );
    $sec_dec_font_size = get_theme_mod( 'archive_desc_font_size', '16px' );
    $archive_desc_color = get_theme_mod( 'archive_desc_color', 'rgba(0, 0, 0, 0.7)' );
    $description_gap = get_theme_mod( 'description_gap', '30px' );
    $article_font_size = get_theme_mod( 'total_article_font_size', '16px' );
    $article_totle_color = get_theme_mod( 'article_totle_color', '#4A3BFD' );
    
    // section title
    $head_sec_title_color = get_theme_mod( 'head_sec_title_color', '#ffffff' );
    $head_sec_title_size = get_theme_mod( 'sechead_title_font_size', '42px' );
    $head_title_gap = get_theme_mod( 'sechead_title_gap', '20px' );

    // section description
    $head_sec_desc_color = get_theme_mod( 'head_desc_color', '#ffffff' );
    $head_sec_desc_size = get_theme_mod( 'sechead_title_font_size', '42px' );
    $head_desc_gap = get_theme_mod( 'sechead_title_gap', '20px' );

    if ( $head_sec_desc_color) {
        $fmc_dynamic_css .= '.section-desc p { color:' . esc_attr( $head_sec_desc_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    
    if ( $head_sec_desc_size) {
        $fmc_dynamic_css .= '.section-desc p { font-size:' . esc_attr( $head_sec_desc_size ) .'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if ( $head_desc_gap) {
        $fmc_dynamic_css .= '.section-desc p { margin-bottom:' . esc_attr( $head_desc_gap ) .'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if ( $head_sec_title_color) {
        $fmc_dynamic_css .= '.section-title h1 { color:' . esc_attr( $head_sec_title_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if ( $head_sec_title_size) {
        $fmc_dynamic_css .= '.section-title h1 { font-size:' . esc_attr( $head_sec_title_size ) .'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if ( $head_title_gap) {
        $fmc_dynamic_css .= '.section-title h1 { margin-bottom:' . esc_attr( $head_title_gap ) .'px } ';
        $fmc_dynamic_css .= "\n";
    }

    if ( $section_bg_area) {
        $fmc_dynamic_css .= '.fddocs-site-main .wraper { background-color:' . esc_attr( $section_bg_area ) .' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-top: ' . esc_attr( $section_border['top-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-right: ' . esc_attr( $section_border['right-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-bottom: ' . esc_attr( $section_border['bottom-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-left: ' . esc_attr( $section_border['left-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border_type ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-style: ' . esc_attr( $section_border_type ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border_color ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-color: ' . esc_attr( $section_border_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $section_border_radius ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {border-radius: ' . esc_attr( $section_border_radius ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $sectionpadding ){
        $fmc_dynamic_css .= '.fddocs-site-main .wraper {padding: ' . esc_attr( $sectionpadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    // thumbnail 
    if( $section_thum_width ){
        $fmc_dynamic_css .= '.fddocs-site-main .top-iocn {width: ' . esc_attr( $section_thum_width ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $section_thum_height ){
        $fmc_dynamic_css .= '.fddocs-site-main .top-iocn {height: ' . esc_attr( $section_thum_height ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $section_thum_bg ){
        $fmc_dynamic_css .= '.fddocs-site-main .top-iocn {background-color: ' . esc_attr( $section_thum_bg ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_bg_width ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {width: ' . esc_attr( $icon_bg_width ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_bg_height ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {height: ' . esc_attr( $icon_bg_height ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }
    if( $icon_bg_color ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {background-color: ' . esc_attr( $icon_bg_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_bdr_setting ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-top: ' . esc_attr( $icon_bdr_setting['top-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_bdr_setting ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-right: ' . esc_attr( $icon_bdr_setting['right-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_bdr_setting ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-bottom: ' . esc_attr( $icon_bdr_setting['bottom-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_bdr_setting ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-left: ' . esc_attr( $icon_bdr_setting['left-width'] ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icob_border_type ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-style: ' . esc_attr( $icob_border_type ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_border_color ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-color: ' . esc_attr( $icon_border_color ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if( $icon_border_radius ){
        $fmc_dynamic_css .= '.fddocs-site-main .icon.icon-one {border-radius: ' . esc_attr( $icon_border_radius ) . ' } ';
        $fmc_dynamic_css .= "\n";
    } 
    
    // section-content
    if( $sectionconpadding ){
        $fmc_dynamic_css .= '.fddocs-site-main .content-area {padding: ' . esc_attr( $sectionconpadding ) . ' } ';
        $fmc_dynamic_css .= "\n";
    }

    if ( $section_content_bg) {
        $fmc_dynamic_css .= '.fddocs-site-main .content-area { background-color:' . esc_attr( $section_content_bg ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $sec_title_font_size) {
        $fmc_dynamic_css .= '.fddocs-site-main .docs-title h1 { font-size:' . esc_attr( $sec_title_font_size ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $sec_title_color) {
        $fmc_dynamic_css .= '.fddocs-site-main .docs-title h1 { color:' . esc_attr( $sec_title_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $sec_title_gap) {
        $fmc_dynamic_css .= '.fddocs-site-main .docs-title h1 {margin-bottom:' . esc_attr( $sec_title_gap ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $sec_dec_font_size) {
        $fmc_dynamic_css .= '.fddocs-site-main .docs-excerpt p { font-size:' . esc_attr( $sec_dec_font_size ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $archive_desc_color) {
        $fmc_dynamic_css .= '.fddocs-site-main .docs-excerpt p { color:' . esc_attr( $archive_desc_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $description_gap) {
        $fmc_dynamic_css .= '.fddocs-site-main .docs-excerpt p { margin-bottom:' . esc_attr( $description_gap ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $article_font_size) {
        $fmc_dynamic_css .= '.fddocs-site-main .total-article .article-total { font-size:' . esc_attr( $article_font_size ) .' } ';
        $fmc_dynamic_css .= "\n";
    }
    if ( $article_totle_color) {
        $fmc_dynamic_css .= '.fddocs-site-main .total-article .article-total { color:' . esc_attr( $article_totle_color ) .' } ';
        $fmc_dynamic_css .= "\n";
    }