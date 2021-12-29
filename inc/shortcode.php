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
        'style' => '',
    ), $atts ) );

    $args = array(
        'post_type' => 'finest-docs',
        'p'         => $id,
        'posts_per_page' => -1, 
    );

    if(!empty($id)){
        $args['post__in'] = fd_get_posts_children($id) ;
       
    }

    // the query
    $the_query = new WP_Query( $args );?>

        <?php if ( $the_query->have_posts() ): ?>
            <?php while ( $the_query->have_posts() ): $the_query->the_post();
                $has_parent = wp_get_post_parent_id( get_the_ID());
            ?>

	            <?php 
                    if(empty($id)){
                        // here will be section layout 

                    }elseif( !$has_parent ){
                        // here will show all docs 
                        
                    }
                    
                ?>

	            <?php endwhile;?>
            <?php wp_reset_postdata();?>

        <?php else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' );?></p>
        <?php endif;

}
add_shortcode( 'ud', 'fd_shortcode' );
?>
