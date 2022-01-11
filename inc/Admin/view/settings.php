<?php
$checked = '';
if ( isset( $_POST['save_changes'] ) ) {

    update_option( 'fddocs_sidebar_all_docs', false );

    if ( array_key_exists( 'enable_multidoc', $_POST ) && 'on' == $_POST['enable_multidoc'] ) {

        update_option( 'fddocs_sidebar_all_docs', true );
    }
}

if ( true == get_option( 'fddocs_sidebar_all_docs' ) ) {
    $checked = 'checked';
}

if ( isset( $_POST['save_changes'] ) ) {


    if ( array_key_exists( 'select_doc_homepage', $_POST ) && 'on' == $_POST['select_doc_homepage'] ) {

        update_option( 'fddocs_documentation_page', $_POST['select_doc_homepage'] );
    }
}


    $doc_page = get_option( 'fddocs_documentation_page', 0 );
    var_dump($_POST);
?>

<div class="wrap" id="fddocs-settings">
    <form action="" method="post">
        <label for="select_doc_homepage"><?php esc_html_e( 'Select Documentation Page','finestdocs' ) ?></label></br>
        <?php  wp_dropdown_pages([
            'name' => 'select_doc_homepage',
            'selected' => $doc_page
            ]); ?></br>
        <!-- <input type="checkbox" name="enable_multidoc" id="enable_multidoc" <?php echo esc_attr( $checked ) ?>> <label for="enable_multidoc"><?php esc_html_e( 'Show all docs at a time.', 'finestdocs' )?></label> -->

        <button type="submit" name="save_changes"><?php esc_html_e( 'Save changes', 'fddocs-mini-cart-pro' )?></button>
    </form>
</div>
