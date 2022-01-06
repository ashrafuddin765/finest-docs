<?php
namespace FDDOCS;
/**
 * Ajax Class.
 */
class Ajax {

    /**
     * Bind actions.
     */
    public function __construct() {
        add_action( 'wp_ajax_fddocs_feedback', [$this, 'feedback_handler'] );
        add_action( 'wp_ajax_nopriv_fddocs_feedback', [$this, 'feedback_handler'] );
    }

    public function feedback_handler() {

        check_ajax_referer( 'finestdocs-nonce' );
        $template = '<div class="wedocs-alert wedocs-alert-%s">%s</div>';
        $previous = isset( $_COOKIE['fddocs_response'] ) ? explode( ',', $_COOKIE['fddocs_response'] ) : [];
        $post_id  = intval( $_POST['post_id'] );
        $type     = in_array( $_POST['type'], ['like', 'dislike'] ) ? $_POST['type'] : false;

        // check previous response
        if ( in_array( $post_id, $previous ) ) {
            $message = sprintf( $template, 'danger', __( 'Sorry, you\'ve already recorded your feedback!', 'wedocs' ) );
            wp_send_json_error( false );
        }

        // seems new
        if ( $type ) {
            $count = (int) get_post_meta( $post_id, $type, true );
            update_post_meta( $post_id, $type, $count + 1 );

            array_push( $previous, $post_id );
            $cookie_val = implode( ',', $previous );

            $val = setcookie( 'fddocs_response', $cookie_val, time() + WEEK_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
        }

        $message = sprintf( $template, 'success', __( 'Thanks for your feedback!', 'wedocs' ) );
        wp_send_json_success( true );
    }

}

$ajax = new Ajax();