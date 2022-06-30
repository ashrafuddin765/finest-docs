<?php fddocs_get_template_part( 'finest-docs', 'sidebar' );?>
<div class="fddocs-single-content layout-03">
    <?php fddocs_breadcrumbs(); ?>
    <article id="post-<?php the_ID(); ?>">

        <?php the_title( '<h1 class="fddoc-single-title">', '</h1>' ) ?>
        <?php
        $docs_enable_print = fddocs_get_option( 'docs_enable_print', true );
        if(true == $docs_enable_print ) : ?>
        <div class="fddoc-print"><span class="dashicons dashicons-printer"></span></div>
        <?php endif; ?>
        <div class="fddocs-entry-content" itemprop="articleBody">
            <div class="fddocs-autoc-wrap fddocs-auto-in-content <?php echo $class; ?>">
                <div class="autoc" data-stopat='h2' data-offset='1'></div>
            </div>
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
        <div class="fdocs-single-post-navigation">
            <?php fddocs_post_navigation(get_the_ID(  ));?>
        </div>
        <div class="fddocs-related-articles">
            <?php fddocs_related_article(wp_get_post_parent_id( get_the_ID() )) ?>
        </div>
        <?php 
            $cta_title = get_theme_mod( 'cta_title', 'Still no luck? We can help!' );
            $cta_description = get_theme_mod( 'cta_description', 'Contact us and we’ll get back to you as soon as possible' );
            $supporturl = get_theme_mod( 'contact_url_page', 'http://example.com/' );
            $cta_text = get_theme_mod( 'cta_button_text', 'Contact support' );
        ?>
        <div class="help-center fdocs-cta">
            <p class="help-text"><?php echo esc_html(  $cta_title ) ?></p>
            <?php printf('<a href="%s">%s</a>',esc_url_raw($supporturl), esc_html( $cta_text)); ?>
            <p class="contact-text"><?php echo esc_html( $cta_description ); ?></p>
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
    </article><!-- #post-## -->
</div><!-- .fddocs-single-content -->