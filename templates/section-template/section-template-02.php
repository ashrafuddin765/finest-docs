<?php
    $child = fd_get_posts_children(get_the_ID(  ));
?>

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
            <a href="<?php echo get_the_permalink(  ) ?>">
                    <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="total-article" >
                <span class="article-total" ><?php 
                IF($child){
                    printf(
                     '%s %s', 
                     fddocs_get_totla_article(get_the_ID(), true),
                     esc_html__( 'Articles ', 'finest-docs' )
                 ); 
                     
                }else{
                    esc_html_e( 'This doc has no article', 'finest-docs' );

                }
                ?> </span>
            </div>
        </div>
    </div>
</div>
   