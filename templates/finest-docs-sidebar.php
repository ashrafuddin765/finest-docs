<div class="finest-sidebar">
    <?php
    $ancestors = [];
    $root      = $parent = false;

    if ( $post->post_parent ) {
        $ancestors = get_post_ancestors( $post->ID );
        $root      = count( $ancestors ) - 1;
        $parent    = $ancestors[$root];
    } else {
        $parent = $post->ID;
    }

    $children = wp_list_pages( [
        'title_li'  => '',
        'order'     => 'menu_order',
        'child_of'  => $parent,
        'echo'      => false,
        'post_type' => 'finest-docs',
    ] );
    ?>

    <h3 class="widget-title"><?php echo get_post_field( 'post_title', $parent, 'display' ); ?></h3>

    <?php if ( $children ) { ?>
        <ul class="finest-nav-list">
            <?php echo $children; ?>
        </ul>
    <?php } ?>
</div>
