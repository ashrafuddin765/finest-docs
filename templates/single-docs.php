<?php 
    get_header(); 
    
?>
<?php 
    $layout = get_theme_mod( 'docs_category_layout', 'layout-01' );
    $class = '';
    if ( 'layout-01' == $layout) {
        $class = 'icon';
    }
    elseif ( 'layout-02' == $layout ) {
        $class = 'without-icon'; 
    }
 
    while ( have_posts() ) {
        the_post(); ?>
        <div class="container-<?php echo esc_attr( $layout ) ?>" >
            <div class="finest-single-wrap">
            <?php 


                    if ( !empty($layout) ) {
                        include FINEST_DOCS_DIR_LY . $layout .'.php';
                    }
        
            ?>  
            </div><!-- .finest-single-wrap -->
        </div>

    <?php } ?>
<?php get_footer(); ?>
                