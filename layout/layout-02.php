
<?php finest_get_template_part( 'finest-docs', 'sidebar' );?> 
<div class="finest-single-content">
    <?php finest_breadcrumbs(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemscope >
        <header class="entry-header">
                <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
        </header>
        <div class="entry-content" itemprop="articleBody">

           
            <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'finest-docs' ), [ 'span' => [ 'class' => [] ] ] ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

         
            ?>
        </div>
        <?php if ( comments_open() || get_comments_number() ) { ?>
                <div class="finest-comments-wrap">
                    <?php comments_template(); ?>
                </div>
        <?php } ?>
    </article><!-- #post-## -->
</div><!-- .finest-single-content -->
 <div class="finest-autoc-wrap <?php echo $class; ?>" >
    <div class="autoc" data-stopat='h2' data-offset='1'></div>
 </div>
