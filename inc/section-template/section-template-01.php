
<div class="col-xl-4 col-lg-4 col-md-6" >
    <div class="wraper" >
        <div class="top-iocn" >
            <div class="icon icon-one" >
                <img src="<?php echo FINEST_DOCS_ASSETS_ASSETS.'/rocket 1.svg' ?>" alt="icon">
            </div>
        </div>
        <div class="content-area" >
            <div class="docs-title" >
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="docs-excerpt" >
                <p><?php echo wp_trim_words(get_the_excerpt(),15,'.'); ?></p>
            </div>
            <div class="total-article" >
                <span class="article-total" ><?php _e( '4 Articles', 'finest-docs' ); ?> </span>
            </div>
        </div>
    </div>
</div>
   