<?php 
    get_header(); 
?>
<?php while ( have_posts() ) {
        the_post(); ?>
        <div class="finest-single-wrap">
        <?php finest_get_template_part( 'finest-docs', 'sidebar' ); ?>
            <div class="finest-single-content">
            <?php finest_breadcrumbs(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemscope >
                <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                    </header>
                <div class="entry-content" itemprop="articleBody">

                <div class="autoc" data-stopat='h6' data-offset='1'></div>
                <?php
                     the_content( sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'finest-docs' ), [ 'span' => [ 'class' => [] ] ] ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );

                   
                   $children = wp_list_pages( 'title_li=&order=menu_order&child_of=' . $post->ID . '&echo=0&post_type=' . $post->post_type );

                   if ( $children ) {
                       echo '<div class="finest-article-child well">';
                       echo '<h3>' . __( 'Articles', 'finest-docs' ) . '</h3>';
                       echo '<ul>';
                       echo $children;
                       echo '</ul>';
                       echo '</div>';
                   }           
                ?>
                </div>


                </article><!-- #post-## -->
            </div><!-- .finest-single-content -->
        </div><!-- .finest-single-wrap -->

    <?php } ?>
<?php get_footer(); ?>
                