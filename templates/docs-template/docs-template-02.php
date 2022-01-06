
<div class="col-12" >
    <div class="docs-wraper docs-templatetwo" >
        <div class="card-top">
            <div class="card-title">
                 <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                ?>
            </div>
        </div>
        <div class="card-bottom">
            <div class="card-content-title">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="docs-article" >
                <span class="docs-article-total" ><?php _e( '113 Articles in this doc', 'finest-docs' ); ?> </span>
            </div>
        </div>
    </div>
</div>
   