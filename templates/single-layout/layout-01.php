
<?php finest_get_template_part( 'finest-docs', 'sidebar' ); ?> 


<div class="finest-single-content">
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
        <footer class="fddocs-entry-footer">
            <div class="footer-area">
                <div class="footer-content">
                    <h3><?php echo esc_html( 'Still no luck? We can help!' ) ?> </h3>
                    <p><?php echo esc_html( 'Contact us and we’ll get back to you as soon as possible.' ); ?></p>
                </div>
                <div class="footer-button">
                    <a href="#">Contact support</a>
                </div>
            </div>
            <div class="fd-powered">
                <span class="fd-footertext" ><?php echo esc_html( 'Powered by UltimateDoc' ) ?></span>
            </div>
        </footer>
        
    </article><!-- #post-## -->
</div><!-- .finest-single-content -->
 <div class="finest-autoc-wrap" >
    <div class="autoc" data-stopat='h2' data-offset='1'></div>
 </div>
