<?php 
    get_header(); 
    
?>
<?php 
    $layout = get_theme_mod( 'docs_category_layout', 'icon' );
    $class = '';
    if ( 'layout-01' == $layout) {
        $class = '';
    }
    elseif ( 'layout-01' == $layout ) {
        $class = 'without-icon';
    }

    while ( have_posts() ) {
        the_post(); ?>
        <div class="finest-single-wrap">
           <?php 


                if ( !empty($layout) ) {
                    include FINEST_DOCS_DIR .'layout/'. $layout .'.php';
                }
    
           ?>
           
            
        </div><!-- .finest-single-wrap -->

    <?php } ?>
<?php get_footer(); ?>
                