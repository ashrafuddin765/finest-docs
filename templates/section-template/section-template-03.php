
<div class="col-xl-6 col-lg-6 col-md-6" >
    <div class="wraper template-third" >
        <div class="content-area" >
            <div class="docs-title" >
                <h1><span class="dashicons dashicons-media-text"></span><?php echo get_the_title(); ?></h1>
            </div>
            <div class="section-article-list" >
                <ul>
                    <?php 
                        $child = fd_get_posts_children( get_the_ID() );
                        if ($child) {
                        foreach ( $child as $item ) {        
                    ?>
                    <li><span class="dashicons dashicons-arrow-right-alt2"></span><a href="<?php echo get_the_permalink(  ) ?>"><?php echo get_the_title( $item ); ?></a></li>
                   <?php } } ?>
                    
                </ul>
            </div>
            <div class="total-article" >
                <span class="article-total" ><?php 
                        if($child){
                            printf('<a href="%s">%s %s %s</a>',
                             get_the_permalink( $child[0] ),
                             esc_html__( 'See all', 'finest-docs' ),fddocs_get_totla_article(get_the_ID(), true),esc_html__( 'Articles', 'finest-docs' )
                         ); 
                        }else{
                            esc_html_e( 'This doc has no article', 'finest-docs' );
                        }
                            
                ?> </span>
            </div>
        </div>
    </div>
</div>
   