<?php
$checked = '';
// if ( isset( $_POST['save_changes'] ) ) {

//     update_option( 'fddocs_sidebar_all_docs', false );

//     if ( array_key_exists( 'enable_multidoc', $_POST ) && 'on' == $_POST['enable_multidoc'] ) {

//         update_option( 'fddocs_sidebar_all_docs', true );
//     }
// }

// if ( true == get_option( 'fddocs_sidebar_all_docs' ) ) {
//     $checked = 'checked';
// }

// if ( isset( $_POST['save_changes'] ) ) {

//     if ( isset( $_POST['select_doc_homepage'] ) ) {

//         update_option( 'fddocs_documentation_page', $_POST['select_doc_homepage'] );
//     }
// }

$fields = [
    'select_doc_homepage',
    'docs_page_title',
    'docs_root_slug',
    'docs_support_page_link',
    'docs_enable_print',
    'docs_enable_feedback',
    'docs_search_not_found_text',
    'docs_search_placeholder',
    'docs_enable_masonry',
    'docs_posts_per_page',
    'article_enable_post_count',
    'article_count_text',
    'article_count_text_singular',
];

$options = [];
if ( isset( $_POST['fddocs_save_changes'] ) ) {
    foreach ( $fields as $setting ) {

        if ( isset( $_POST[$setting] ) ) {
            $value             = sanitize_text_field( $_POST[$setting] );
            $options[$setting] = $value;
        }
    }
}

if ( !empty( $options ) ) {
    update_option( 'finestdocs_settings', $options, false );
}

$select_doc_homepage         = fddocs_get_option( 'select_doc_homepage', false );
$docs_page_title             = fddocs_get_option( 'docs_page_title', __( 'FinestDevs Products', 'finest-docs' ) );
$docs_root_slug              = fddocs_get_option( 'docs_root_slug', 'docs' );
$docs_support_page_link      = fddocs_get_option( 'docs_support_page_link', 'https://finestdevs.com' );
$docs_enable_feedback        = fddocs_get_option( 'docs_enable_feedback', true );
$docs_enable_print           = fddocs_get_option( 'docs_enable_print', true );
$docs_search_not_found_text  = fddocs_get_option( 'docs_search_not_found_text', __( 'Sorry nothing matched', 'finest-docs' ) );
$docs_search_placeholder     = fddocs_get_option( 'docs_search_placeholder', __( 'Search for articles... ', 'finest-docs' ) );
$docs_enable_masonry         = fddocs_get_option( 'docs_enable_masonry', true );
$docs_posts_per_page         = fddocs_get_option( 'docs_posts_per_page', 10 );
$article_enable_post_count   = fddocs_get_option( 'article_enable_post_count', true );
$article_count_text          = fddocs_get_option( 'article_count_text', __( 'Articles', 'finest-docs' ) );
$article_count_text_singular = fddocs_get_option( 'article_count_text_singular', __( 'Article', 'finest-docs' ) );

?>
<!-- general  -->
<div class="wrap" id="fddocs-settings">
    <form action="" method="post">

        <!-- fddocs setting menu  -->
        <ul id="tabs" class="fddocs-setting-tabs-menu">
            <li><button class="fddocs-tab-link"
                    onclick="fddocsTabs(event,'fddocs-settings-general' ); ">General</button>
            </li>
            <li><button class="fddocs-tab-link" onclick="fddocsTabs(event, 'fddocs-settings-layout')">Layout</button>
            </li>
            <li><button class="fddocs-tab-link" onclick="fddocsTabs(event, 'fddocs-settings-Design')">Design</button>
            </li>

        </ul>
        <!-- general -->
        <div id="fddocs-settings-general" class="fddocs-tab-content" style="display: block;">
            <!-- doc home  -->
            <div class="fddocs-setting-field fddocs-docs-home">

                <label for="select_doc_homepage"><?php esc_html_e( 'Select Documentation Page', 'finestdocs' )?></label>
                <?php
wp_dropdown_pages( [
    'name'     => 'select_doc_homepage',
    'selected' => fddocs_get_option( 'select_doc_homepage' ),
] );
?>

                <!-- <input type="checkbox" name="enable_multidoc" id="enable_multidoc" <?php echo esc_attr( $checked ) ?>> -->
                <!-- <label for="enable_multidoc"><?php esc_html_e( 'Show all docs at a time.', 'finestdocs' )?></label> -->
            </div>

            <!-- doc pag title  -->
            <div class="fddocs-setting-field fddocs-docs-page-title">

                <label for="docs_page_title"><?php esc_html_e( 'Docs Pate Title', 'finestdocs' )?></label>

                <input type="text" name="docs_page_title" id="docs_page_title"
                    value="<?php echo esc_attr( $docs_page_title ) ?>">
            </div>

            <!-- doc root slug  -->
            <div class="fddocs-setting-field fddocs-docs-root-slug">

                <label for="docs_root_slug"><?php esc_html_e( 'Docs Root Slug', 'finestdocs' )?></label>

                <input type="text" name="docs_root_slug" id="docs_root_slug"
                    value="<?php echo esc_attr( $docs_root_slug ) ?>">
            </div>

            <!-- Support page link  -->
            <div class="fddocs-setting-field fddocs-suppport-page-link">

                <label for="docs_support_page_link"><?php esc_html_e( 'Support Page link', 'finestdocs' )?></label>

                <input type="text" name="docs_support_page_link" id="docs_support_page_link"
                    value="<?php echo esc_url( $docs_support_page_link ) ?>">
            </div>


            <!-- Enable feedback  -->
            <div class="fddocs-setting-field fddocs-print-article">
                <label for="docs_enable_print"><?php esc_html_e( 'Print Article', 'finestdocs' )?></label>
                <input type="checkbox" name="docs_enable_print" id="docs_enable_print" <?php echo $docs_enable_print ? 'checked' : ''; ?>>
            </div>

            <!-- Enable feedback  -->
            <div class="fddocs-setting-field fddocs-print-article">
                <label for="docs_enable_feedback"><?php esc_html_e( 'Helpful Feedback', 'finestdocs' )?></label>
                <input type="checkbox" name="docs_enable_feedback" id="docs_enable_feedback" <?php echo $docs_enable_feedback ? 'checked' : ''; ?>>
            </div>


        </div>
        <!-- Layout -->
        <div id="fddocs-settings-layout" class="fddocs-tab-content">

            <!-- tab menu -->


            <!-- layout doc page  -->


            <!-- layout design-page  -->
            <div id="fddocs-layout-doc-page" class="fddocs-layout-doc-page">

                <!-- doc search placeholder  -->
                <div class="fddocs-setting-field fddocs-docs-page-title">

                    <label for="docs_search_placeholder"><?php esc_html_e( 'Search Placeholder', 'finestdocs' )?></label>

                    <input type="text" name="docs_search_placeholder" id="docs_search_placeholder"
                        value="<?php echo esc_attr( $docs_search_placeholder ) ?>">
                </div>

                <!-- doc search not found  -->
                <div class="fddocs-setting-field fddocs-search-not-found-text">

                    <label for="docs_search_not_found_text"><?php esc_html_e( 'Search Not Found Text', 'finestdocs' )?></label>

                    <input type="text" name="docs_search_not_found_text" id="docs_search_not_found_text"
                        value="<?php echo esc_attr( $docs_search_not_found_text ) ?>">
                </div>

                <!-- Enable maoneyr  -->
                <div class="fddocs-setting-field fddocs-enable-masonry">
                    <label for="docs_enable_masonry"><?php esc_html_e( 'Enable Masonry', 'finestdocs' )?></label>
                    <input type="checkbox" name="docs_enable_masonry" id="docs_enable_masonry" <?php echo $docs_enable_masonry ? 'checked' : ''; ?>>
                </div>
                <!-- doc post per page  -->
                <div class="fddocs-setting-field fddocs-post-per-page">

                    <label
                        for="docs_posts_per_page"><?php esc_html_e( 'Number of posts to show per page', 'finestdocs' )?></label>

                    <input type="text" name="docs_posts_per_page" id="docs_posts_per_page"
                        value="<?php echo esc_attr( $docs_posts_per_page ) ?>">
                </div>

                <!-- Enable Post count  -->
                <div class="fddocs-setting-field fddocs-enable-post-count">
                    <label
                        for="article_enable_post_count"><?php esc_html_e( 'Enable Post Count', 'finestdocs' )?></label>
                    <input type="checkbox" name="article_enable_post_count" id="article_enable_post_count" <?php echo $article_enable_post_count ? 'checked' : ''; ?>>
                </div>

                <!-- Enable count test  -->
                <div class="fddocs-setting-field fddocs-count-text">
                    <label for="article_count_text"><?php esc_html_e( 'Count Text', 'finestdocs' )?></label>
                    <input type="text" name="article_count_text" id="article_count_text" value="<?php echo esc_attr( $article_count_text ) ?>">
                </div>

                <!-- Enable count test singluar  -->
                <div class="fddocs-setting-field fddocs-count-text-singular">
                    <label
                        for="article_count_text_singular"><?php esc_html_e( 'Count Text Singular', 'finestdocs' )?></label>
                    <input type="text" name="article_count_text_singular" id="article_count_text_singular" value="<?php echo esc_attr( $article_count_text_singular ) ?>">
                </div>
            </div>



        </div>
        <!-- Design -->
        <div id="fddocs-settings-design" class="fddocs-tab-content">

            <!-- tab menu -->
            <a href=""><?php esc_html_e( 'Customize FinestDocs', 'finestdocs' )?></a>

        </div>

        <!-- Shortcode list -->
        <div id="fddocs-settings-shortcodes" class="fddocs-tab-content">

            <!-- tab menu -->
            <!-- <a href=""><?php esc_html_e( 'Customize FinestDocs', 'finestdocs' )?></a> -->

        </div>





</div>




<button type="submit" name="fddocs_save_changes"><?php esc_html_e( 'Save changes', 'fddocs-mini-cart-pro' )?></button>
</form>
</div>