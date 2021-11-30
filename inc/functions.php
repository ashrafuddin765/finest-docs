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
        $html .= '<li><span class="dashicons dashicons-admin-home"></span></li>';
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
?>