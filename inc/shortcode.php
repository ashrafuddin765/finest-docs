<?php
 
function finest_docs_shortcode( $atts ) {
    if ( empty( $atts ) ) {
        $atts = array();
    }
    if ( empty( $atts['stopat'] ) ) {
        $atts['stopat'] = 'h4';
    }
    if ( empty( $atts['offset'] ) ) {
        $atts['offset'] = '20';
    }
    return '<div class="autoc" data-stopat="' . $atts['stopat'] . '" data-offset="' . $atts['offset'] . '"></div>';
}
add_shortcode( 'finest-doc-toc', 'finest_docs_shortcode' );

function fd_shortcode( $atts ) {
    $docs = get_theme_mod( 'docs_select_layout', 'docs-template-01' );
    $section = get_theme_mod( 'section_select_layout', 'section-template-01' );


    extract( shortcode_atts( array(
        'id'    => '',
        'style' => '01',
    ), $atts ) );

    $args = array(
        'post_type'      => 'docs',
        'posts_per_page' => -1,
    );

    if ( !empty( $id ) ) {
        $children = fd_get_posts_children( $id ) ? fd_get_posts_children( $id ) : [0];
        $args['post__in'] = $children;

    }

    // the query
    $the_query = new WP_Query( $args );
    
 

    ?>

<div class="finest-site-main <?php echo esc_attr( $section ); ?> <?php echo esc_attr( $docs) ?>" >
<div class="finest-container" >
    <div class="row" >
        <?php if ( $the_query->have_posts() ): ?>
            <?php while ( $the_query->have_posts() ): $the_query->the_post();
                $has_parent = wp_get_post_parent_id( get_the_ID());
            ?>

            <?php 
                    if( !empty ($id) ){

                        // here will be section layout 
                        include FINEST_DOCS_DIR .'templates/section-template/'.$section.'.php';

                    }elseif( !$has_parent ){
                        // here will show all docs 
                        include FINEST_DOCS_DIR .'templates/docs-template/'.$docs.'.php';
                    }
                    
                ?>

            <?php endwhile;?>
            <?php wp_reset_query(  );?>

            <?php else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' );?></p>
            <?php endif;?>
        </div>
    </div>
</div>
<?Php
}
add_shortcode( 'ud', 'fd_shortcode' );

/* Ud Search  */
function fddocs_search_shortcode( $atts ) {

    extract( shortcode_atts( array(
        'id'    => '',
        'style' => '01',
    ), $atts ) );

    $search_icon = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M14.75 14.75L10.25 10.25M11.75 6.5C11.75 9.39949 9.39949 11.75 6.5 11.75C3.60051 11.75 1.25 9.39949 1.25 6.5C1.25 3.60051 3.60051 1.25 6.5 1.25C9.39949 1.25 11.75 3.60051 11.75 6.5Z" stroke="#161617" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    ';
    $dropdown_args = [
        'post_type'         => 'docs',
        'echo'              => 0,
        'depth'             => 1,
        'show_option_none'  => __( 'All Docs', 'finestdocs' ),
        'option_none_value' => 'all',
        'name'              => 'search_in_doc',
    ];

    if ( isset( $_GET['search_in_doc'] ) && 'all' != $_GET['search_in_doc'] ) {
        $dropdown_args['selected'] = (int) $_GET['search_in_doc'];
    }

    $form = '<form role="search" method="get" class="search-form finestdocs-search-form" action="' . esc_url( home_url( '/' ) ) . '">
    <div class="finestdocs-search-input">
        <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'finestdocs' ) . '</span>
        <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search for articles...', 'placeholder', 'finestdocs' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'finestdocs' ) . '" />
        <input type="hidden" name="post_type" value="docs" />
        <input type="hidden" name="post_id" value="'.esc_html($id).'" />
        <button class="search-submit" type="submit">'.$search_icon.'</button>
    </div>
 
</form>';
    return $form;
}
add_shortcode( 'ud_search', 'fddocs_search_shortcode' );


// socila share shortcode
function fddocs_social_share()
{ 
    $social_title = get_theme_mod( 'social_share_ttile', 'Social Share' );
    $onfacebook = get_theme_mod( 'switch_facebook_share', true );
    $ontwitter = get_theme_mod( 'enable_Twitter_sharing', true );
    $onlinkdin = get_theme_mod( 'enable_linkedin_sharing', true );
    $onpinterest = get_theme_mod( 'enable_pinterest_sharing', true );
    ?>
	<div class="fddocs-social-share">
		<div class="fddocs-socshare-heading">
			<?php echo '<h5>' . esc_html( $social_title) . '</h5>'; ?>
		</div>
		<ul class="fddocs-social-share-links">
            <?php if ( true == $onfacebook ): ?>
			<li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo FINEST_DOCS_ASSETS_ASSETS.'facebook.svg' ?>" alt="Facebook"></a></li>
            <?php endif; ?>

            <?php if ( true == $ontwitter ): ?>
            <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo FINEST_DOCS_ASSETS_ASSETS.'twitter.svg' ?>" alt="Twitter"></a></li>
            <?php endif; ?>

            <?php if ( true == $onlinkdin ): ?>
            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo FINEST_DOCS_ASSETS_ASSETS.'linkedin.svg' ?>" alt="LinkedIn"></a></li>
            <?php endif; ?>

            <?php if ( true == $onpinterest ): ?>
            <li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo FINEST_DOCS_ASSETS_ASSETS.'pinterest.svg' ?>" alt="Pinterest"></a></li>
            <?php endif; ?>
		</ul>
	</div> 
<?php }

add_shortcode('fddocs_social_share', 'fddocs_social_share');











?>
