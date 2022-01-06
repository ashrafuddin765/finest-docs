<?php
    $first_child = fd_get_posts_children(get_the_ID(  ));
    $first_child = $first_child != false? $first_child[0] : 0;


?>

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
                <?php if($first_child): ?>
                <a href="<?php echo get_the_permalink( $first_child ) ?>">
                <?php endif; ?>
                    <h1><?php echo get_the_title(); ?></h1>
                <?php if($first_child): ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ( !empty( get_the_content() ) ): ?>
            <div class="docs-excerpt" >
                <p><?php echo wp_trim_words(get_the_content(),15,'.'); ?></p>
            </div>
            <?php endif; ?>
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
   