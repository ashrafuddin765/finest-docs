<?php
get_header();

?>
<?php
$class = '';?>
<div class="finest-search-page">
    <div class="finest-search-bar">
        <div class="finest-container">
            <div class="fddox-search-title">
                <?php if(have_posts(  )): ?>
                    <h2><?php esc_html_e( 'Search for articles', 'finestdocs' ) ?></h2>
                    <p><?php esc_html_e( 'You can search for a question here. It will help you get the most common anwers easily.', 'finestdocs' ) ?>
                    </p>
                <?php else: ?>
                <h2><?php esc_html_e( 'Sorry nothing matched!', 'finestdocs' ) ?></h2>
                <p><?php esc_html_e( 'Please try again with some different keywords.', 'finestdocs' ) ?>
                <?php endif; ?>
            </div>

            <div class="fddocs-search-wrap">
                <?php printf( do_shortcode( '[ud_search]' ) ) ?>
            </div>
        </div>
    </div>
    <?php if(have_posts(  )): ?>
    <div class="finest-search-results">

        <div class="finest-container">
            <div class="finest-search-restult-title">
                <?php
                    printf(
                        /* translators: %s: Search term. */
                            '<h4>%s <strong>%s</strong></h4>',
                            esc_html__( 'You are searching for:', 'finestdos' ),
                            esc_html( get_search_query() )
                    );
                ?>
            </div>
            <div class="finest-result-single-wrap">



                <?php
             
                    while ( have_posts() ) :
                        the_post();?>
                <?php
                        $first_parent = wp_get_post_parent_id( get_the_ID() );
                        if($first_parent):
                            $second_parent = wp_get_post_parent_id( $first_parent );
                            if($second_parent):?>
                            <div class="fddocs-single-search-item finest-single-content">
                                <?php finest_breadcrumbs() ?>
                                <a href="<?php the_permalink() ?>"><?php the_title( '<h4>', '</h4>' ) ?></a>
                                <?php echo wp_trim_words( get_the_excerpt(  ), '25' ) ?>
                            </div>

                        <?php
                            endif;
                        endif;
                        ?>
                <?php 
                    endwhile;
                wp_reset_query(  );
                ?>

            </div><!-- .finest-single-wrap -->
        </div>
    </div>

    <?php endif; ?>
</div>
<?php get_footer();?>