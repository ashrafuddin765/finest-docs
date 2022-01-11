<?php fddocs_get_template_part( 'finest-docs', 'sidebar' );?>
<div class="fddocs-single-content layout-04">
    <?php fddocs_breadcrumbs(); ?>
    <article id="post-<?php the_ID(); ?>">

        <?php the_title( '<h1 class="fddoc-single-title">', '</h1>' ) ?>
        <div class="fddocs-autoc-wrap fddocs-auto-in-content">
            <div class="autoc" data-stopat='h2' data-offset='1'></div>
        </div>
        <div class="fddocs-entry-content" itemprop="articleBody">
            <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'finest-docs' ), [ 'span' => [ 'class' => [] ] ] ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
        </div>
        <div class="fddocs-article-footer">
            <div class="fddocs-meta-area">
                <div class="fddocs-footer-meta">
                    <?php printf('%s %s',
                            esc_html__( 'Updated on ', 'fddocs'),
                            get_the_modified_time('M d, Y'));
                        ?>
                </div>
                <?php printf('%s', fddocs_feedback_html()) ?>
            </div>
            <?php 
            $socialenable = get_theme_mod( 'switch_social_share', true );
            if ( true == $socialenable ) {
                echo do_shortcode( '[fddocs_social_share]' );
            }    
            ?>
        </div>
        <div class="fddocs-related-articles">
            <?php fddocs_related_article(wp_get_post_parent_id( get_the_ID() )) ?>
        </div>
        <div class="fdocs-ctn">
            <div class="footer-area">
                <div class="footer-content">
                    <h3><?php echo esc_html( 'Still no luck? We can help!' ) ?> </h3>
                    <p><?php echo esc_html( 'Contact us and we’ll get back to you as soon as possible.' ); ?></p>
                </div>
                <div class="footer-button">
                    <?php 
                         $supporturl = get_theme_mod( 'contact_url_page', 'http://example.com/' );
                         printf('<a href="%s">%s</a>',esc_url_raw($supporturl), esc_html('Contact support'));
                    ?>

                </div>
            </div>
        </div>
        <div class="fdoc-powered">
            <span class="fddoc-copyright">
                <?php printf('%s <a href="%s">%s</a>', 
                        esc_html( 'Powered by '),
                        esc_url( 'https://finestdevs.com' ),
                        esc_html( 'UltimateDoc' )
                     ) ?>
            </span>
        </div>
        <?php if ( comments_open() || get_comments_number() ) { ?>
        <div class="fddocs-comments-wrap">
            <?php comments_template(); ?>
        </div>
        <?php } ?>
    </article><!-- #post-## -->
</div><!-- .fddocs-single-content -->