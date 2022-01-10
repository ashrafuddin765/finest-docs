<?php 


    get_header(); 
    
?>
<?php 
    $layout = get_theme_mod( 'docs_category_layout', 'layout-01' );
    $class = 'finest-container-fluid';
    if ( 'layout-01' == $layout) {
        $class = 'finest-container-fluid';
    }
    elseif ( 'layout-02' == $layout || 'layout-03' == $layout ) {
        $class = 'finest-container'; 
    }
 
    while ( have_posts() ) {
        the_post(); ?>

        <?php 
          
             $first_parent = wp_get_post_parent_id( get_the_ID() );
             if($first_parent):
                 $second_parent = wp_get_post_parent_id( $first_parent );
                 if($second_parent):?>

                    <div class="<?php echo esc_attr( $class ) ?>" >
                        <div class="finest-single-wrap">
                        <?php 
                            if ( !empty($layout) ) {
                                include FINEST_DOCS_DIR.'templates/single-layout/' . $layout .'.php';
                            }
                        ?>  
                        </div><!-- .finest-single-wrap -->
                    </div>
                <?php else: ?>
                    <?php 


                        $first_article_id =  fd_get_posts_children(get_the_ID(  )) ? fd_get_posts_children(get_the_ID(  ))[0] : [];

                        $args = [
                            'post_type' => 'docs',
                            'p' => $first_parent,
                            'posts_per_page' => 1
                        ];
                            $the_query = new WP_Query( $args );
                            if($the_query->have_posts(  )){
                                while ( $the_query->have_posts() ): $the_query->the_post();?>
                                    <div class="<?php echo esc_attr( $class ) ?>" >
                                        <div class="finest-single-wrap">

                                        <?php 

                                            if ( !empty($layout) ) {
                                                
                                                include FINEST_DOCS_DIR.'templates/single-layout/' . $layout .'.php';
                                            }
                                        ?>  
                                        </div><!-- .finest-single-wrap -->
                                    </div>
                                <?php endwhile;
                            }
                        ?>
                <?php endif; ?>
            <?php else: 
             include FINEST_DOCS_DIR.'templates/fddocs-sections.php';
            endif; ?>
    <?php } ?>
<?php get_footer(); ?>
                