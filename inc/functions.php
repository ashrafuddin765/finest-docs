<?php
function finest_get_template_part( $slug, $name = '' ) {

    $templates = [];
    $name      = (string) $name;

    // lookup at theme/slug-name.php or finest/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = FINEST_DOCS_TEMPLATE . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( FINEST_DOCS_TEMPLATE . "{$slug}-{$name}.php" ) ) {
        $template = FINEST_DOCS_TEMPLATE . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = [
            "{$slug}.php",
            $finest->FINEST_DOCS_TEMPLATE . "{$slug}.php",
        ];

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}

function finest_breadcrumbs() {
    global $post;

    $html = '';
    $args = apply_filters( 'finest_breadcrumbs', [
        'delimiter' => '<li class="delimiter"><span class="dashicons dashicons-arrow-right-alt2"></span></li>',
        'home'      => __( 'Home', 'finest-docs' ),
        'before'    => '<li><span class="current">',
        'after'     => '</span></li>',
    ] );

    $breadcrumb_position = 1;

    $html .= '<ul class="finest-breadcrumb" itemscope >';
    $html .= finest_get_breadcrumb_item( $args['home'], home_url( '/' ), $breadcrumb_position );
    $html .= $args['delimiter'];

    if ( 'finest-docs' == $post->post_type && $post->post_parent ) {
        $parent_id   = $post->post_parent;
        $breadcrumbs = [];

        while ( $parent_id ) {
            ++$breadcrumb_position;

            $page          = get_post( $parent_id );
            $breadcrumbs[] = finest_get_breadcrumb_item( get_the_title( $page->ID ), get_permalink( $page->ID ), $breadcrumb_position );
            $parent_id     = $page->post_parent;
        }

        $breadcrumbs = array_reverse( $breadcrumbs );

        for ( $i = 0; $i < count( $breadcrumbs ); ++$i ) {
            $html .= $breadcrumbs[$i];
            $html .= ' ' . $args['delimiter'] . ' ';
        }
    }

    $html .= ' ' . $args['before'] . get_the_title() . $args['after'];

    $html .= '</ul>';

    echo apply_filters( 'finest_breadcrumbs_html', $html, $args );
}

function finest_get_breadcrumb_item( $label, $permalink, $position = 1 ) {

    return '<li itemprop="itemListElement" itemscope >
            <a itemprop="item" href="' . esc_attr( $permalink ) . '">
            <span itemprop="name">' . esc_html( $label ) . '</span></a>
            <meta itemprop="position" content="' . $position . '" />
        </li>';

}

function fmc_css_strip_whitespace( $css ) {
    $replace = array(
        '#/\*.*?\*/#s' => '', // Strip C style comments.
        '#\s\s+#' => ' ', // Strip excess whitespace.
    );
    $search = array_keys( $replace );
    $css    = preg_replace( $search, $replace, $css );

    $replace = array(
        ': ' => ':',
        '; ' => ';',
        ' {' => '{',
        ' }' => '}',
        ', ' => ',',
        '{ ' => '{',
        ';}' => '}', // Strip optional semicolons.
        ",\n" => ',', // Don't wrap multiple selectors.
        "\n}" => '}', // Don't wrap closing braces.
        '} ' => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys( $replace );
    $css    = str_replace( $search, $replace, $css );

    return trim( $css );
}

function fd_get_posts_children( $parent_id ) {

    $post = get_post( $parent_id );
    if ( empty( $post ) ) {
        return false;
    }
    $children = array();
    // grab the posts children
    $posts = get_posts( array( 'numberposts' => -1, 'post_parent' => $parent_id, 'post_type' => $post->post_type, 'suppress_filters' => false ) );

    // now grab the grand children
    foreach ( $posts as $child ) {
        // recursion!! hurrah
        $children[] = $child->ID;
    }
    // merge in the direct descendants we found earlier

    return !empty( $children ) ? $children : false;
}
/**
 * Duplicates a post & its meta and it returns the new duplicated Post ID
 * @param  [int] $post_id The Post you want to clone
 * @return [int] The duplicated Post ID
 */
function fd_duplicate( $post_id, $parent_id = '' ) {

    // And all the original post data then
    $post = get_post( $post_id );

    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user    = wp_get_current_user();
    $new_post_author = $current_user->ID;

    // if post data exists (I am sure it is, but just in a case), create the post duplicate
    if ( $post ) {

        // new post data array
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $parent_id,
            'post_password'  => $post->post_password,
            'post_status'    => 'publish',
            'post_title'     => $post->post_title . ' copied',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order,
        );

        // insert the post by wp_insert_post() function
        $new_post_id = wp_insert_post( $args );

        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies( get_post_type( $post ) ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        if ( $taxonomies ) {
            foreach ( $taxonomies as $taxonomy ) {
                $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
                wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
            }
        }
        return $new_post_id;
    }

}

function fd_duplicator( $post_id ) {
    $old_parent_id = wp_get_post_parent_id( $post_id );
    $new_post_id   = fd_duplicate( $post_id, $old_parent_id );
    $child_ids     = fd_get_posts_children( $post_id );

    // var_dump($new_post_id);
    if ( $new_post_id && false != $child_ids ) {
        foreach ( $child_ids as $child_id ) {
            $new_child_id = fd_duplicate( $child_id, $new_post_id );
            $sl_child_ids = fd_get_posts_children( $child_id );
            if ( $new_child_id && false != $sl_child_ids ) {
                foreach ( $sl_child_ids as $sl_child_id ) {
                    fd_duplicate( $sl_child_id, $new_child_id );
                }
            }
        }
    }

    return $new_post_id;

}

// body class added

add_filter( 'body_class', 'finest_body_classes' );

function finest_body_classes( $classes ) {
    $classes[] = 'finest-body';
    return $classes;

}

/**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function fddox_register_query_vars( $vars ) {
    $vars[] = 'doc-search';
    return $vars;
}
add_filter( 'query_vars', 'fddox_register_query_vars' );

/**
 * Override Movie Archive Query
 * https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 */
function fddocs_search_query( $query ) {
    // only run this query if we're on the job archive page and not on the admin side
    if ( $query->is_archive( 'docs' ) && $query->is_main_query() && !is_admin() ) {
        // get query vars from url.
        // https://codex.wordpress.org/Function_Reference/get_query_var#Examples
        $search_key = get_query_var( 'doc-search', FALSE );

        $query->set( 's', esc_attr( $search_key ) );
    }
}
add_action( 'pre_get_posts', 'fddocs_search_query' );


add_filter( 'template_include', 'wpa3396_page_template' );
function wpa3396_page_template( $page_template ) {

    if ( is_search() && 'finest-docs' == get_query_var( 'post_type' ) ) {
        $page_template = FINEST_DOCS_DIR . 'templates/search.php';
    }

    if ( get_page_template_slug() === 'fddocs-sections.php' ) {

        $page_template = FINEST_DOCS_DIR . '/templates/fddocs-sections.php';

    }
 
    if ( get_page_template_slug() === 'fddocs.php' ) {

        $page_template = FINEST_DOCS_DIR . '/templates/fddocs.php';

    }

    if ( $page_template == '' ) {
        throw new \Exception( 'No template found' );
    }

    return $page_template;
}



/**
 * Add "Custom" template to page attirbute template section.
 */
function wpse_288589_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

    // Add custom template named template-with-sidebar.php to select dropdown
    $post_templates['fddocs.php'] = __( 'Documentation Page' );
    $post_templates['fddocs-sections.php'] = __( 'Doc Sections' );

    return $post_templates;
}

add_filter( 'theme_page_templates', 'wpse_288589_add_template_to_select', 10, 4 );
