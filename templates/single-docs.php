<?php 
    get_header(); 
    
?>
<?php 
    $layout = get_theme_mod( 'docs_category_layout', 'icon' );
    $class = '';
    if ( 'icon' == $layout) {
        $class = '';
    }
    elseif ( 'without-icon' == $layout ) {
        $class = 'without-icon';
    }
    while ( have_posts() ) {
        the_post(); ?>
        <div class="finest-single-wrap">
           <?php 
                if ( 'icon' == $layout ) {
                    include FINEST_DOCS_DIR .'layout\layout-01.php';
                }
                elseif ('without-icon' == $layout ) {
                    include FINEST_DOCS_DIR .'layout\layout-02.php';
                }
           ?>
           
            
        </div><!-- .finest-single-wrap -->

    <?php } ?>
<?php get_footer(); ?>
                