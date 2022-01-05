<?php
/**
* Template Name: Documentation Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/ ?>
<?php get_header(); ?>
<body <?php body_class('finest-body') ?> >
<div class="fddoc-main">
    <div class="finest-container">
        <div class="row">
            <div class="col-6">
                <div class="template-header" >
                    <div class="header-title" >
                        <h1><?php echo esc_html( 'FinestDevs Products' ); ?></h1>
                    </div>
                    <div class="header-desc" >
                        <p><?php echo esc_html( 'You can search for a question here. It will help you get the most common anwers easily.' ) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo do_shortcode( '[ud]' );?>
</div>
</body>
<?php get_footer(); ?>