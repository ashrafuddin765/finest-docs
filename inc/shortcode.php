<?php
 
function finest_docs_shortcode( $atts ) {
    if ( empty( $atts ) ) {
        $atts = array();
    }
    if ( empty( $atts['stopat'] ) ) {
        $atts['stopat'] = 'h4';
    }
    if ( empty( $atts['offset'] ) ) {
        $atts['offset'] = '20';
    }
    return '<div class="autoc" data-stopat="' . $atts['stopat'] . '" data-offset="' . $atts['offset'] . '"></div>';
}
add_shortcode( 'finest-doc-toc', 'finest_docs_shortcode' );

function fd_shortcode( $atts ) {
    $docs = get_theme_mod( 'docs_select_layout', 'docs-template-01' );
    $section = get_theme_mod( 'section_select_layout', 'section-template-01' );


    extract( shortcode_atts( array(
        'id'    => '',
        'style' => '01',
    ), $atts ) );

    $args = array(
        'post_type'      => 'finest-docs',
        'posts_per_page' => -1,
    );

    if ( !empty( $id ) ) {

        $args['post__in'] = fd_get_posts_children( $id );

    }

    // the query
    $the_query = new WP_Query( $args );
    
 

    ?>

        <?php if ( $the_query->have_posts() ): ?>
            <div <?php post_class('finest-site-main template-two'); ?> >
            <div class="finest-container" >
                <div class="row" >
            <?php while ( $the_query->have_posts() ): $the_query->the_post();
                $has_parent = wp_get_post_parent_id( get_the_ID());
            ?>

	            <?php 
                    if( !empty ($id) ){
                        // here will be section layout 
                        include FINEST_DOCS_DIR .'templates/section-template/'.$section.'.php';

                    }elseif( !$has_parent ){
                        // here will show all docs 
                        include FINEST_DOCS_DIR .'templates/docs-template/'.$docs.'.php';
                    }
                    
                ?>

	            <?php endwhile;?>
            <?php wp_reset_postdata();?>

            </div>
        </div>
        <?php else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' );?></p>
        <?php endif;

}
add_shortcode( 'ud', 'fd_shortcode' );

/* Ud Search  */
function fddocs_search_shortcode( $atts ) {

    extract( shortcode_atts( array(
        'id'    => '',
        'style' => '01',
    ), $atts ) );

    $search_icon = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M14.75 14.75L10.25 10.25M11.75 6.5C11.75 9.39949 9.39949 11.75 6.5 11.75C3.60051 11.75 1.25 9.39949 1.25 6.5C1.25 3.60051 3.60051 1.25 6.5 1.25C9.39949 1.25 11.75 3.60051 11.75 6.5Z" stroke="#161617" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    ';
    $dropdown_args = [
        'post_type'         => 'finest-docs',
        'echo'              => 0,
        'depth'             => 1,
        'show_option_none'  => __( 'All Docs', 'finestdocs' ),
        'option_none_value' => 'all',
        'name'              => 'search_in_doc',
    ];

    if ( isset( $_GET['search_in_doc'] ) && 'all' != $_GET['search_in_doc'] ) {
        $dropdown_args['selected'] = (int) $_GET['search_in_doc'];
    }

    $form = '<form role="search" method="get" class="search-form finestdocs-search-form" action="' . esc_url( home_url( '/' ) ) . '">
    <div class="finestdocs-search-input">
        <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'finestdocs' ) . '</span>
        <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search for articles...', 'placeholder', 'finestdocs' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'finestdocs' ) . '" />
        <input type="hidden" name="post_type" value="finest-docs" />
        <button class="search-submit" type="submit">'.$search_icon.'</button>
    </div>
 
</form>';
    return $form;
}
add_shortcode( 'ud_search', 'fddocs_search_shortcode' );
?>
