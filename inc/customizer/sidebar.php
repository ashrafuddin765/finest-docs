<?php
Kirki::add_section( 'doc_sidebar', array(
	'title'          => esc_html__( 'Sidebar Option', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );


// sidebar_width

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'sidebar_width_setting',
	'label'       => esc_html__( 'Sidebar Area Width', 'finest-docs' ),
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
			'element'  => '.finest-single-wrap .finest-sidebar',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
] );

// background color
Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-single-wrap .finest-sidebar',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );
// padding

Kirki::add_field( 'docs_panel', [
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
Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-single-wrap .finest-sidebar',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px'
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li a',
			'function' => 'css',
			'property' => 'color',
			
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );


Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	]
] );

// subcategory

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li ul.children li a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li ul.children li a',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul li ul.children li a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );




Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'icon_box',
	'section'     => 'doc_sidebar',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Icon', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul.finest-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px'
		],
		[
			'element'  => '.finest-sidebar ul.finest-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px'
		],
		[
			'element'  => '.finest-sidebar ul.finest-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px'
		],
		[
			'element'  => '.finest-sidebar ul.finest-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'line-height',
			'units'    => 'px'
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul.finest-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
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
			'element'  => '.finest-sidebar ul.finest-nav-list li a span.dashicons',
			'function' => 'css',
			'property' => 'margin-right',
			'units'    => 'px'
		],
	]
] );