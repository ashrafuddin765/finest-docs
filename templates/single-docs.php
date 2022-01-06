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
        <div class="<?php echo esc_attr( $class ) ?>" >
            <div class="finest-single-wrap">
            <?php 
                if ( !empty($layout) ) {
                    include FINEST_DOCS_DIR.'templates/single-layout/' . $layout .'.php';
                }
            ?>  
            </div><!-- .finest-single-wrap -->
        </div>

    <?php } ?>
<?php get_footer(); ?>
                