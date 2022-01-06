<?php
get_header();

$section_id = isset($_GET['post_id'])  ? intval($_GET['post_id']) : 0;
$class = '';?>
<div class="finest-search-page">
    <div class="finest-search-bar">
        <div class="finest-container">
            <div class="fddox-search-title">

                <h2><?php esc_html_e( 'Search for articles', 'finestdocs' ) ?></h2>
                <p><?php esc_html_e( 'You can search for a question here. It will help you get the most common anwers easily.', 'finestdocs' ) ?>
                </p>


            </div>

            <div class="fddocs-search-wrap">
                <?php printf( do_shortcode( '[ud_search id='.$section_id.']' ) ) ?>
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
                $found_post = 0;
                while ( have_posts() ) :
                    the_post();
                    ob_start();
                    ?>
        
                <div class="fddocs-single-search-item finest-single-content">
                    <?php finest_breadcrumbs() ?>
                    <a href="<?php the_permalink() ?>"><?php the_title( '<h4>', '</h4>' ) ?></a>
                    <?php echo wp_trim_words( get_the_excerpt(  ), '25' ) ?>
                </div>
                <?php
                    $result_html = ob_get_clean();
                    $first_parent = wp_get_post_parent_id( get_the_ID() );

                    if(0 != $section_id ){
                        if($section_id == $first_parent){
                            printf('%s', $result_html);
                            $found_post++;
                        }
                    }else{

                        if($first_parent):
                            $second_parent = wp_get_post_parent_id( $first_parent );
                            if($second_parent):
                                printf('%s', $result_html);
                                $found_post++;
                            endif;
                        endif;
                    }
                ?>
            <?php 
                endwhile;


            if(0 == $found_post){
                printf('<h4>%s</h4>', esc_html__( 'Sorry nothing matched!', 'finestdocs' ));

            }
            ?>

            </div><!-- .finest-single-wrap -->
        </div>
    </div>

    <?php endif; ?>
</div>
<?php get_footer();?>