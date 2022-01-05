<?php  
$layout = get_theme_mod( 'docs_category_layout', 'layout-01' );
$class = 'layout-one-bg';
if ( 'layout-01' == $layout) {
    $class = 'layout-one-bg';
}
elseif ( 'layout-02' == $layout ) {
    $class = 'layout-two-bg';
}
elseif ( 'layout-03' == $layout ) {
    $class = 'layout-three';
}
?>
<div class="finest-sidebar <?php echo $class; ?>">
<nav id="mainnav" >
    <div id="menu" ><span class="dashicons dashicons-menu"></span></div>
    <?php
$ancestors        = [];
$root             = $parent             = false;
$enabled_multidoc = get_option( 'finestdocs_sidebar_all_docs', true );
$layout           = get_theme_mod( 'docs_category_layout', 'icon' );
$link_before      = '';
if ( 'layout-01' == $layout ) {
    $link_before = '';
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
   
    <?php if ( $children ) {
    ?>
        <ul class="finest-nav-list">
            <?php
echo $children;
    ?>
        </ul>
    <?php }?>
</nav>
</div>

