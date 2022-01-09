<?php finest_get_template_part( 'finest-docs', 'sidebar' );?> 
<div class="finest-single-content layout-three">
    <?php finest_breadcrumbs(); ?>
    <article id="post-<?php the_ID(); ?>" >
        <div class="entry-content" itemprop="articleBody">
            <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'finest-docs' ), [ 'span' => [ 'class' => [] ] ] ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
        </div>
        <div class="fddocs-article-footer">
            <?php printf('%s', fddocs_feedback_html()) ?>
            <div class="fddocs-footer-meta">
                <?php printf('%s %s',
                        esc_html__( 'Updated on ', 'finestdocs'),
                        get_the_modified_time('M d, Y'));
                    ?>
            </div>
        </div>
        <div class="help-center">
            <p class="help-text" >Still no luck? We can help!</p>
            <a href="#" class="contact-support" >Contact our support</a>
            <p class="contact-text" >Contact us and we’ll get back to you as soon as possible.</p>
        </div>
        <div class="fdoc-powered">
        <span class="fddoc-copyright" >
                <?php printf('%s <a href="%s">%s</a>', 
                        esc_html( 'Powered by '),
                        esc_url( 'https://finestdevs.com' ),
                        esc_html( 'UltimateDoc' )
                     ) ?>
            </span>
        </div>
        <?php if ( comments_open() || get_comments_number() ) { ?>
                <div class="finest-comments-wrap">
                    <?php comments_template(); ?>
                </div>
        <?php } ?>
    </article><!-- #post-## -->
</div><!-- .finest-single-content -->
 
