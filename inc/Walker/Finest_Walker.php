<?php
class Finest_walker extends Walker {

    /**
     * What the class handles.
     *
     * @since 2.1.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'page';

    /**
     * Database fields to use.
     *
     * @since 2.1.0
     * @var array
     *
     * @see Walker::$db_fields
     * @todo Decouple this.
     */
    public $db_fields = array(
        'parent' => 'post_parent',
        'id'     => 'ID',
    );

    /**
     * Outputs the beginning of the current level in the tree before elements are output.
     *
     * @since 2.1.0
     *
     * @see Walker::start_lvl()
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
     * @param array  $args   Optional. Arguments for outputting the next level.
     *                       Default empty array.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        $indent = str_repeat( $t, $depth );
        $output .= "{$n}{$indent}<ul class='children'>{$n}";
    }

    /**
     * Outputs the end of the current level in the tree after elements are output.
     *
     * @since 2.1.0
     *
     * @see Walker::end_lvl()
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
     * @param array  $args   Optional. Arguments for outputting the end of the current level.
     *                       Default empty array.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        $indent = str_repeat( $t, $depth );
        $output .= "{$indent}</ul>{$n}";
    }

    /**
     * Outputs the beginning of the current element in the tree.
     *
     * @see Walker::start_el()
     * @since 2.1.0
     *
     * @param string  $output       Used to append additional content. Passed by reference.
     * @param WP_Post $page         Page data object.
     * @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
     * @param array   $args         Optional. Array of arguments. Default empty array.
     * @param int     $current_page Optional. Page ID. Default 0.
     */
    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        if ( $depth ) {
            $indent = str_repeat( $t, $depth );
        } else {
            $indent = '';
        }

        $css_class = array( 'page_item', 'page-item-' . $page->ID );

        if ( isset( $args['pages_with_children'][$page->ID] ) ) {
            $css_class[] = 'page_item_has_children';
        }

        if ( !empty( $current_page ) ) {
            $_current_page = get_post( $current_page );

            if ( $_current_page && in_array( $page->ID, $_current_page->ancestors, true ) ) {
                $css_class[] = 'current_page_ancestor';
            }

            if ( $page->ID == $current_page ) {
                $css_class[] = 'current_page_item';
            } elseif ( $_current_page && $page->ID === $_current_page->post_parent ) {
                $css_class[] = 'current_page_parent';
            }
        } elseif ( get_option( 'page_for_posts' ) == $page->ID ) {
            $css_class[] = 'current_page_parent';
        }

        /**
         * Filters the list of CSS classes to include with each page item in the list.
         *
         * @since 2.8.0
         *
         * @see wp_list_pages()
         *
         * @param string[] $css_class    An array of CSS classes to be applied to each list item.
         * @param WP_Post  $page         Page data object.
         * @param int      $depth        Depth of page, used for padding.
         * @param array    $args         An array of arguments.
         * @param int      $current_page ID of the current page.
         */
        $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
        $css_classes = $css_classes ? ' class="' . esc_attr( $css_classes ) . '"' : '';

        if ( '' === $page->post_title ) {
            /* translators: %d: ID of a post. */
            $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
        }

        $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
        $args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

        $atts                 = array();
        $first_child = fd_get_posts_children($page->ID);
        $first_child = $first_child != false? $first_child[0] : 0;
    
        $atts['href']         = false != $first_child ? get_the_permalink( $first_child ) : get_the_permalink( $page->ID ) ;
        $atts['aria-current'] = ( $page->ID == $current_page ) ? 'page' : '';

        /**
         * Filters the HTML attributes applied to a page menu item's anchor element.
         *
         * @since 4.8.0
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $href         The href attribute.
         *     @type string $aria-current The aria-current attribute.
         * }
         * @param WP_Post $page         Page data object.
         * @param int     $depth        Depth of page, used for padding.
         * @param array   $args         An array of arguments.
         * @param int     $current_page ID of the current page.
         */
        $atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $layout = get_theme_mod( 'docs_category_layout', 'icon' );
        if ( 'layout-01' == $layout ) {

            $doc_icon_meta = get_post_meta( $page->ID, 'fd_doc_icon', true );
            $doc_icon      = !empty( $doc_icon_meta ) ? '<img src="' . esc_url( $doc_icon_meta ) . '"/>' : '';
        }else{
            $doc_icon = '';
        }

        $output .= $indent . sprintf(
            '<li%s><a%s> %s %s%s%s</a>',
            $css_classes,
            $attributes,
            $doc_icon,
            $args['link_before'],
            /** This filter is documented in wp-includes/post-template.php */
            apply_filters( 'the_title', $page->post_title, $page->ID ),
            $args['link_after']
        );

        if ( !empty( $args['show_date'] ) ) {
            if ( 'modified' === $args['show_date'] ) {
                $time = $page->post_modified;
            } else {
                $time = $page->post_date;
            }

            $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
            $output .= ' ' . mysql2date( $date_format, $time );
        }
    }

    /**
     * Outputs the end of the current element in the tree.
     *
     * @since 2.1.0
     *
     * @see Walker::end_el()
     *
     * @param string  $output Used to append additional content. Passed by reference.
     * @param WP_Post $page   Page data object. Not used.
     * @param int     $depth  Optional. Depth of page. Default 0 (unused).
     * @param array   $args   Optional. Array of arguments. Default empty array.
     */
    public function end_el( &$output, $page, $depth = 0, $args = array() ) {
        if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        $output .= "</li>{$n}";
    }

}