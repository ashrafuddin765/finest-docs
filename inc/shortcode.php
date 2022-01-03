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

    extract( shortcode_atts( array(
        'id' => '',
        'style' => '01',
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
            <div class="section-container" >
                <div class="row" >
            <?php while ( $the_query->have_posts() ): $the_query->the_post();
                $has_parent = wp_get_post_parent_id( get_the_ID());
            ?>

	            <?php 
                    if( !empty ($id) ){
                        // here will be section layout 
                        include FINEST_DOCS_INC .'section-template/section-template-'.$style.'.php';

                    }elseif( !$has_parent ){
                        // here will show all docs 
                        include FINEST_DOCS_INC .'docs-template/docs-template-'.$style.'.php';
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
