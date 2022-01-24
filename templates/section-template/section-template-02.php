<?php
    $first_child = fd_get_posts_children(get_the_ID(  ));
?>

<div class="col-12">
    <div class="wraper template-scnd">
        <div class="icon scnd-icon">
            <?php 
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
        ?>
        </div>
        <div class="content-area">
            <div class="docs-title">
                <a href="<?php echo get_the_permalink(  ) ?>">
                    <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="total-article">
                <span class="article-total">
            <?php 
                $enable_article_count = fddocs_get_option('article_enable_post_count', true);
                $article_count_text = fddocs_get_option('article_count_text', 'Articles');
                $article_count_text_singular = fddocs_get_option('article_count_text_singular', 'Article');
                if($first_child && $enable_article_count){
                    $total_article = fddocs_get_total_article(get_the_ID(), true);
                    printf(
                    '%s %s', 
                    $total_article,
                    _nx( $article_count_text_singular, $article_count_text, $total_article , $total_article, 'finest-docs' )
                ); 
                }else{
                    esc_html_e( 'This doc has no article', 'finest-docs' );

                }
                ?> </span>
            </div>
        </div>
    </div>
</div>