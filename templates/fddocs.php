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
     $docs = get_theme_mod( 'docs_layout_design', 'docs-template-01' );
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
<div class="fddoc-main <?php echo esc_attr( $docs ); ?>">
    <div class="fddoc-bg-color" >
        <div class="fddocs-container">
            <div class="row">
                <div class="<?php echo esc_attr( $gridclass ); ?>">
                    <div class="doc-template-header" >
                        <div class="doc-header-title" >
                            <h1><?php echo esc_html( 'FinestDevs Products' ); ?></h1>
                        </div>
                        <div class="doc-header-desc" >
                            <p><?php echo esc_html( $docs_description ); ?></p>
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