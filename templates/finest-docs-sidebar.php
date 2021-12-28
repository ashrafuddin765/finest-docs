<?php  
$layout = get_theme_mod( 'docs_category_layout', 'layout-01' );
$class = '';
if ( 'layout-01' == $layout) {
    $class = 'layout-one-bg';
}
elseif ( 'layout-02' == $layout ) {
    $class = 'layout-two-bg';
}
?>
<div class="finest-sidebar <?php echo $class; ?>">
    <?php
$ancestors        = [];
$root             = $parent             = false;
$enabled_multidoc = get_option( 'finestdocs_sidebar_all_docs', true );
$layout           = get_theme_mod( 'docs_category_layout', 'icon' );
$link_before      = '';
if ( 'layout-01' == $layout ) {
    $link_before = '<span class="dashicons dashicons-admin-generic"></span>';
}

if ( $enabled_multidoc ) {
    if ( $post->post_parent ) {
        $ancestors = get_post_ancestors( $post->ID );
        $root      = count( $ancestors ) - 1;
        $parent    = $ancestors[$root];
    } else {
        $parent = $post->ID;
    }
}

$children = wp_list_pages( [
    'title_li'    => '',
    'order'       => 'menu_order',
    'child_of'    => $parent,
    'echo'        => false,
    'post_type'   => 'finest-docs',
    // 'link_after' => '<span class="toggle-menu dashicons dashicons-arrow-up-alt2"></span>',
    'link_before' => $link_before,
    'walker' => new Finest_walker()
] );
?>
    <?php if ( $enabled_multidoc ): ?>
    <h3 class="widget-title"><?php echo get_post_field( 'post_title', $parent, 'display' ); ?></h3>
    <?php endif;?>


    <?php if ( $children ) {
    ?>
        <ul class="finest-nav-list">
            <?php
echo $children;
    ?>
        </ul>
    <?php }?>
</div>

