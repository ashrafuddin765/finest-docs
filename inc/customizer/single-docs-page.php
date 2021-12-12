<?php
Kirki::add_section( 'single_page', array(
	'title'          => esc_html__( 'Single Docs Page', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );

// category layout

Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-image',
	'settings'    => 'docs_category_layout',
	'label'       => esc_html__( 'Select Layout', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'left',
	'priority'    => 10,
	'choices'     => [
		'left'   => plugin_dir_url( __FILE__ ) . '/assets/img/single-layout-1.png',
		'center' => get_template_directory_uri() . '/assets/img/single-layout-2.png',
		'right'  => '/assets/img/single-layout-3.png',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'single_page_width',
	'label'       => esc_html__( 'Content Area Width', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 75,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-wrap .finest-single-content',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
] );

// background color
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'content_area_backgound',
	'label'       => __( 'Content Area Background Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ast-separate-container .finest-docs.ast-article-single:not(.ast-related-post)',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

// padding
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'docs_padding',
	'label'       => esc_html__( 'Padding', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
] );

// post title

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'title_box',
	'section'     => 'single_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Post Title', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'title_font_size',
	'label'       => esc_html__( 'Title Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 28,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'content_title_color',
	'label'       => __( 'Content Title Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

// title margin
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'content_title_margin',
	'label'       => esc_html__( 'Margin', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'margin-top'    => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px',
		'margin-right'  => '0px',
	],
] );

//entry content

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'content_box',
	'section'     => 'single_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Entry Content', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'desc_font_size',
	'label'       => esc_html__( 'Content Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'content_desc_color',
	'label'       => __( 'Content Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'desc_content_margin',
	'label'       => esc_html__( 'Margin', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'margin-top'    => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px',
		'margin-right'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'breadcrumb_box',
	'section'     => 'single_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Breadcrumb', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'bread_font_size',
	'label'       => esc_html__( 'Breadcrumb Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 14,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => '',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'content_bread_color',
	'label'       => __( 'Breadcrumb Font Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'hover_bread_color',
	'label'       => __( 'Breadcrumb Hover Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'active_bread_color',
	'label'       => __( 'Breadcrumb Active Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'icon_bread_color',
	'label'       => __( 'Breadcrumb Icon Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'bread_icon_size',
	'label'       => esc_html__( 'Breadcrumb Icon Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 14,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => '',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'table_contents_box',
	'section'     => 'single_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Table Of Contents', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'docs_table_width',
	'label'       => esc_html__( 'Content Area Width', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 75,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'table_area_backgound',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'docs_table_padding',
	'label'       => esc_html__( 'Content Area Padding', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'table_content_radius',
	'label'       => esc_html__( 'Content Area Radius', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 28,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'table_title_font_size',
	'label'       => esc_html__( 'Title Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 18,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'table_title_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'table_title_hover_color',
	'label'       => __( 'Title Hover Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'table_title_active_color',
	'label'       => __( 'Title Active Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'table_margin',
	'label'       => esc_html__( 'Title Margin', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'margin-top'    => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px',
		'margin-right'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'social_share_box',
	'section'     => 'single_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Social Share', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'switch',
	'settings'    => 'switch_social_share',
	'label'       => esc_html__( 'Enable Social Share', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'finest-docs' ),
		'off' => esc_html__( 'Disable', 'finest-docs' ),
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'     => 'text',
	'settings' => 'social_share_ttile',
	'label'    => esc_html__( 'Social Share Title', 'finest-docs' ),
	'section'  => 'single_page',
	'priority' => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'social_title_color',
	'label'       => __( 'Social Title Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );
Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'social_title_font_size',
	'label'       => esc_html__( 'Social Title Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 14,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'switch',
	'settings'    => 'switch_facebook_share',
	'label'       => esc_html__( 'Enable Facebook Share', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'finest-docs' ),
		'off' => esc_html__( 'Disable', 'finest-docs' ),
	],
] );
Kirki::add_field( 'docs_panel', [
	'type'        => 'switch',
	'settings'    => 'enable_Twitter_sharing',
	'label'       => esc_html__( 'Enable Twitter Sharing', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'finest-docs' ),
		'off' => esc_html__( 'Disable', 'finest-docs' ),
	],
] );
Kirki::add_field( 'docs_panel', [
	'type'        => 'switch',
	'settings'    => 'enable_linkedin_sharing',
	'label'       => esc_html__( 'Enable Linkedin Sharing', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'finest-docs' ),
		'off' => esc_html__( 'Disable', 'finest-docs' ),
	],
] );
Kirki::add_field( 'docs_panel', [
	'type'        => 'switch',
	'settings'    => 'enable_pinterest_sharing',
	'label'       => esc_html__( 'Enable Pinterest Sharing', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'finest-docs' ),
		'off' => esc_html__( 'Disable', 'finest-docs' ),
	],
] );