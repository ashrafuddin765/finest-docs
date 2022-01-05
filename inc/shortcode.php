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
        'id' => '',
        'style' => '',
    ), $atts ) );

    $args = array(
        'post_type' => 'finest-docs',
        'posts_per_page' => -1, 
    );

    if(!empty($id)){
        
        $args['post__in'] = fd_get_posts_children($id) ;
       
    }

    // the query
    $the_query = new WP_Query( $args );?>

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
                        include FINEST_DOCS_INC .'section-template/'.$section.'.php';

                    }elseif( !$has_parent ){
                        // here will show all docs 
                        include FINEST_DOCS_INC .'docs-template/'.$docs.'.php';
                    }
                    
                ?>

	            <?php endwhile;?>
            <?php wp_reset_postdata();?>
            </div>
        </div>
        </div>
        <?php else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' );?></p>
        <?php endif;

}
add_shortcode( 'ud', 'fd_shortcode' );
?>
