<?php finest_get_template_part( 'finest-docs', 'sidebar' );?> 
<div class="finest-single-content tamplate-three">
    <?php finest_breadcrumbs(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemscope >
        <div class="entry-content" itemprop="articleBody">
            <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'finest-docs' ), [ 'span' => [ 'class' => [] ] ] ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
        </div>
        <div class="rate-article">
            <div class="article-like">
                <span class="article-title" >Rate this article</span>
                <span class="dashicons dashicons-arrow-up"></span>
                <span class="dashicons dashicons-arrow-down"></span>
            </div>
            <div class="update-date">
                <span class="update-text">Updated on April 2021</span>
            </div>
        </div>
        <div class="help-center">
            <p class="help-text" >Still no luck? We can help!</p>
            <a href="#" class="contact-support" >Contact our support</a>
            <p class="contact-text" >Contact us and we’ll get back to you as soon as possible.</p>
        </div>
        <div class="ultimatedoc">
            <p>Powered by <a href="#" >UltimateDoc</a></p>
        </div>
        <?php if ( comments_open() || get_comments_number() ) { ?>
                <div class="finest-comments-wrap">
                    <?php comments_template(); ?>
                </div>
        <?php } ?>
    </article><!-- #post-## -->
</div><!-- .finest-single-content -->
 
