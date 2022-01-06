
<div class="col-xl-6 col-lg-6 col-md-6" >
    <div class="wraper template-third" >
        <div class="content-area" >
            <div class="docs-title" >
                <h1><span class="dashicons dashicons-media-text"></span><?php echo get_the_title(); ?></h1>
            </div>
            <div class="section-article-list" >
                <ul>
                    <li><span class="dashicons dashicons-arrow-right-alt2"></span><a href="#">Basic Requirements</a></li>
                    <li><span class="dashicons dashicons-arrow-right-alt2"></span><a href="#">WordPress Installation</a></li>
                    <li><span class="dashicons dashicons-arrow-right-alt2"></span><a href="#">Requirement for this theme</a></li>
                    <li><span class="dashicons dashicons-arrow-right-alt2"></span><a href="#">Files Included</a></li>
                </ul>
            </div>
            <div class="total-article" >
                <span class="article-total" ><?php 
                           printf(
                            '%s <a href="%s">%s</a>', 
                            fddocs_get_totla_article(get_the_ID(), true),
                            get_the_permalink( fd_get_posts_children(get_the_ID(  ))[0] ),
                            esc_html__( 'See all 7 Articles ', 'finest-docs' )
                        ); 
                            
                ?> </span>
            </div>
        </div>
    </div>
</div>
   