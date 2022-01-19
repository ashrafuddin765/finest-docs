<?php
Kirki::add_section( 'doc_sidebar', array(
	'title'          => esc_html__( 'Sidebar Option', 'finest-docs' ),
	'panel'          => 'fddocs_panel',
	'priority'       => 160,
) );

// background color
Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'sidebar_backgound',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#F8F8FA',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-single-wrap .fddocs-sidebar',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );
// padding

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'sidebar_padding',
	'label'       => esc_html__( 'Padding', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => [
		'padding-top'    => '30px',
		'padding-bottom' => '20px',
		'padding-right'  => '15px',
		'padding-left'   => '45px',
		
	],
] );

// border_radius
Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'sidebar_border_radius',
	'label'       => esc_html__( 'Radius', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 0,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-single-wrap .fddocs-sidebar',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px'
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'section_font_size',
	'label'       => esc_html__( 'Font Size', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 18,
	'choices'     => [
		'min'  => 0,
		'max'  => 100, 
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'single_category_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#000000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li a',
			'function' => 'css',
			'property' => 'color',
			
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'single_category_hover_color',
	'label'       => __( 'Title Hover Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#000000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );


Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'section_margin_bottom',
	'label'       => esc_html__( 'Section Margin Bottom', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100, 
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	]
] );

// subcategory

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'subcate_font_size',
	'label'       => esc_html__( 'Article Font Size', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 14,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li ul.children li a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'sub_single_category_color',
	'label'       => __( 'Article Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 'color: rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li ul.children li a',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'sub_category_hover_color',
	'label'       => __( 'Article Hover Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#000000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul li ul.children li a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'icon_box',
	'section'     => 'doc_sidebar',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Icon', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'sidebar_icon_size',
	'label'       => esc_html__( 'Icon Size', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 18,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul.fddocs-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px'
		],
		[
			'element'  => '.fddocs-sidebar ul.fddocs-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px'
		],
		[
			'element'  => '.fddocs-sidebar ul.fddocs-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px'
		],
		[
			'element'  => '.fddocs-sidebar ul.fddocs-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'line-height',
			'units'    => 'px'
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'sidebar_icon_color',
	'label'       => __( 'Icon Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#111827',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul.fddocs-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'sidebar_icon_gap',
	'label'       => esc_html__( 'Icon Gap', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 20,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar ul.fddocs-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'margin-right',
			'units'    => 'px'
		],
	]
] );


Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'responsive_menu_box',
	'section'     => 'doc_sidebar',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Responsive Menu', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'select',
	'settings'    => 'open_icon_position',
	'label'       => esc_html__( 'Open Icon Position', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 'left-bottom',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left-top' => esc_html__( 'Left Top', 'finest-docs' ),
		'left-bottom' => esc_html__( 'Left Bottom', 'finest-docs' ),
		'right-top' => esc_html__( 'Right Top', 'finest-docs' ),
		'right-bottom' => esc_html__( 'Right Bottom', 'finest-docs' ),
		'left-vertical-center' => esc_html__( 'Left vertical Center', 'finest-docs' ),
		'right-vertical-center' => esc_html__( 'Right vertical Center', 'finest-docs' ),
	],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'open_icon_color',
	'label'       => __( 'Open Icon Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#ccc',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar #mainnav>.fddoc-sidebar-trigger',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'open_icon_size',
	'label'       => esc_html__( 'Open Icon Size', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 20,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar #mainnav>.fddoc-sidebar-trigger span.dashicons.dashicons-menu',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px'
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'close_icon_color',
	'label'       => __( 'Close Icon Color', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => '#cccccc',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar #mainnav .fddoc-nav-inner .fddoc-sidebar-trigger',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'close_icon_size',
	'label'       => esc_html__( 'Close Icon Size', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 20,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-sidebar #mainnav .fddoc-nav-inner .fddoc-sidebar-trigger span.dashicons.dashicons-no-alt',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px'
		],
	]
] );