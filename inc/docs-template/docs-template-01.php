
<div class="col-xl-4 col-lg-4 col-md-6" >
    <div class="docs-wraper" >
        <div class="card-top">
            <div class="card-title">
            <img src="<?php echo FINEST_DOCS_ASSETS_ASSETS.'/docs-thumbnail1.png' ?>" alt="thumbnail" />
            </div>
        </div>
        <div class="card-bottom">
            <div class="card-content-title">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="card-content">
                <p><?php echo wp_trim_words( get_the_excerpt(),15,'.'); ?></p>
            </div>
            <div class="card-button">
                <a href="#"><?php _e( 'Read the doc', 'finest-docs' ) ?> </a>
            </div>
        </div>
    </div>
</div>
   