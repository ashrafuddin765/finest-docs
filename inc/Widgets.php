<?php
class Widget extends \WP_Widget {

    /**
     * Sets up the widgets name etc.
     */
    public function __construct() {
        
        $widget_ops = [
            'classname'   => 'finestdocs-search-widget',
            'description' => __( 'Document Search Widget', 'finestdocs' ),
        ];

        parent::__construct( 'finestdocs-search-widget', __( 'FinestDocs Document Search', 'finestdocs' ), $widget_ops );
    }

    /**
     * Outputs the content of the widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $dropdown_args = [
            'post_type'         => 'finest-docs',
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
                <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Documentation Search &hellip;', 'placeholder', 'finestdocs' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'finestdocs' ) . '" />
                <input type="hidden" name="post_type" value="finest-docs" />
            </div>
            <div class="finestdocs-search-in">
            ' . wp_dropdown_pages( $dropdown_args ) . '
            </div>
            <input type="submit" class="search-submit" value="' . esc_attr_x( 'Search', 'submit button', 'finestdocs' ) . '" />
        </form>';

        echo $form;

        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin.
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        $title = !empty( $instance['title'] ) ? $instance['title'] : __( 'Documentation Search', 'finestdocs' ); ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    /**
     * Processing widget options on save.
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        $instance          = [];
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
}
