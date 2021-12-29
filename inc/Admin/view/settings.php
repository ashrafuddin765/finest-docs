<?php
$checked = '';
if ( isset( $_POST['save_changes'] ) ) {

    update_option( 'finestdocs_sidebar_all_docs', false );

    if ( array_key_exists( 'enable_multidoc', $_POST ) && 'on' == $_POST['enable_multidoc'] ) {

        update_option( 'finestdocs_sidebar_all_docs', true );
    }
}

if ( true == get_option( 'finestdocs_sidebar_all_docs' ) ) {
    $checked = 'checked';
}
?>

<div class="wrap" id="finestdocs-settings">
    <form action="" method="post">
        <input type="checkbox" name="enable_multidoc" id="enable_multidoc" <?php echo esc_attr( $checked ) ?>> <label for="enable_multidoc"><?php esc_html_e( 'Show all docs at a time.', 'finestdocs' )?></label>

        <button type="submit" name="save_changes"><?php esc_html_e( 'Save changes', 'finest-mini-cart-pro' )?></button>
    </form>
</div>
