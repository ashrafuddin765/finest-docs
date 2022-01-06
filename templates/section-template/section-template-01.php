
<div class="col-xl-4 col-lg-4 col-md-6" >
    <div class="wraper" >
        <div class="top-iocn" >
            <div class="icon icon-one" >
            <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                ?>
            </div>
        </div>
        <div class="content-area" >
            <div class="docs-title" >
                <a href="<?php echo get_the_permalink( fd_get_posts_children(get_the_ID(  ))[0] ) ?>">
                    <h1><?php echo get_the_title(); ?></h1>
            </a>
            </div>
            <div class="docs-excerpt" >
                <p><?php echo wp_trim_words(get_the_excerpt(),15,'.'); ?></p>
            </div>
            <div class="total-article" >
                <span class="article-total" ><?php 
                    printf(
                        '%s %s', 
                        fddocs_get_totla_article(get_the_ID(), true),
                        esc_html__( 'Articles ', 'finest-docs' )
                    ); 
                            
                ?> </span>
            </div>
        </div>
    </div>
</div>
   