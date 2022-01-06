<?php
/**
* Template Name: Documentation Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/ ?>
<?php get_header(); ?>
<?php
     $docs = get_theme_mod( 'docs_select_layout', 'docs-template-01' );
     if ( 'docs-template-01' ==   $docs ){
        $gridclass = "col-12 col-xl-6";
    }
    elseif ( 'docs-template-02' ==  $docs ) {
        $gridclass = "col-12";
    }
    else {
        $gridclass = "col-12 col-xl-6";
    }
?>
<div class="fddoc-main">
    <div class="fddoc-bg-color <?php echo esc_attr( $docs ); ?>" >
        <div class="finest-container">
            <div class="row">
                <div class="<?php echo esc_attr( $gridclass ); ?>">
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
    </div>
    <?php echo do_shortcode( '[ud]' );?>
</div>
</body>
<?php get_footer(); ?>