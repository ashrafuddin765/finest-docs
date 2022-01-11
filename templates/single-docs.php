<?php 


    get_header(); 
    
?>
<?php 
    $layout = get_theme_mod( 'docs_category_layout', 'layout-01' );
    $class = 'fddocs-container';
    if ( 'layout-01' == $layout) {
        $class = 'fddocs-container-fluid';
    }
 
    while ( have_posts() ) {
        the_post(); 
        $idd = get_the_ID(  );
        $doc_type = get_post_meta( $idd, 'doc_type', true );
        ?>

        <?php 

             if('article' == $doc_type):
                ?>

                    <div class="<?php echo esc_attr( $class. ' '. $layout ) ?>" >
                        <div class="fddocs-single-wrap">
                        <?php 
                                include FINEST_DOCS_DIR.'templates/single-layout/' . $layout .'.php';
                        ?>  
                        </div><!-- .fddocs-single-wrap -->
                    </div>
            <?php elseif('doc' == $doc_type): 
                include FINEST_DOCS_DIR.'templates/fddocs-sections.php';
            endif; ?>
    <?php } ?>
<?php get_footer(); ?>
                