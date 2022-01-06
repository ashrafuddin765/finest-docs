
<?php get_header(); ?>

<div class="docsectin-main">
    <div class="section-bg" >
        <div class="finest-container">
            <div class="row">
                <div class="col-6">
                    <div class="section-header" >
                        <div class="section-title" >
                            <h1><?php echo esc_html( 'ShadePro Documentation' ); ?></h1>
                        </div>
                        <div class="section-desc" >
                            <p><?php echo esc_html( 'You can search for a question here. It will help you get the most common anwers easily.' ) ?></p>
                        </div>
                        <div class="section-search" >
                            <?php echo do_shortcode( '[ud_search id='.get_the_ID().']' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo do_shortcode( '[ud id='.get_the_ID().']' );?>
</div>

<?php get_footer(); ?>

