
<div class="col-12" >
    <div class="wraper template-scnd" >
        <div class="icon scnd-icon" >
        <?php 
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
        ?>
        </div>
        <div class="content-area" >
            <div class="docs-title" >
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="total-article" >
                <span class="article-total" ><?php _e( '11 Articles in this section', 'finest-docs' ); ?> </span>
            </div>
        </div>
    </div>
</div>
   