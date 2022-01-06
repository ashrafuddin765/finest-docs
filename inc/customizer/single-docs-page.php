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
	'label'       => esc_html__( 'Select Single Doc Layout', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'layout-01',
	'priority'    => 10,
	'choices'     => [
		'layout-01'   => FINEST_DOCS_ASSETS_ASSETS . 'layout-1.png',
		'layout-02' => FINEST_DOCS_ASSETS_ASSETS . 'layout-2.png',
		'layout-03' => FINEST_DOCS_ASSETS_ASSETS . 'layout-3.png',
		
	],
] );

// background color
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_area_backgound',
	'label'       => __( 'Content Area Background Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#F3F5F7',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-wrap',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

// padding
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'content_padding',
	'label'       => esc_html__( 'Contnet Area Padding', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-left' => '0px',
		'padding-bottom'   => '0px',
		'padding-right'  => '0px',
	],
	
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'single_page_width',
	'label'       => esc_html__( 'Doc Area Width', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 50,
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
	'label'       => __( 'Doc Area Background Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-wrap .finest-single-content',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

// padding
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'docs_padding',
	'label'       => esc_html__( 'Doc Padding', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'padding-top'    => '45px',
		'padding-left' => '45px',
		'padding-bottom'   => '190px',
		'padding-right'  => '45px',
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
	'settings'    => 'post_title_font_size',
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
			'element'  => '.finest-single-content .entry-content h2',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'post_title_color',
	'label'       => __( 'Post Title Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content .entry-content h2',
			'function' => 'css',
			'property' => 'color',

		],
	]
] );

// title margin
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'post_title_margin',
	'label'       => esc_html__( 'Margin', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'margin-top'    => '0px',
		'margin-right' => '0px',
		'margin-bottom'   => '0px',
		'margin-left'  => '0px',
	], 
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'post_title_title_margin',
	'label'       => esc_html__( 'Title Margin', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content .entry-content h2',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
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
	'settings'    => 'entry_font_size',
	'label'       => esc_html__( 'Font Size', 'finest-docs' ),
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
			'element'  => '.finest-single-content .entry-content p',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'content_desc_color',
	'label'       => __( 'Content Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content .entry-content p',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'entry_margin_bottom',
	'label'       => esc_html__( 'Margin Bottom', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 35,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content .entry-content p',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
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
	'settings'    => 'bradcrumb_font_size',
	'label'       => esc_html__( 'Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content ul.finest-breadcrumb li a,
			.finest-single-content ul.finest-breadcrumb li .current',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] ); 

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'bread_font_color',
	'label'       => __( 'Breadcrumb Font Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'rgba(22, 22, 23, 0.6)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content ul.finest-breadcrumb li a',
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
			'element'  => '.finest-single-content ul.finest-breadcrumb li a:hover',
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
	'default'     => '#4A3BFD',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content ul.finest-breadcrumb li .current',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'bradcrumb_margin',
	'label'       => esc_html__( 'Margin Bottom', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 25,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-wrap .finest-single-content ul.finest-breadcrumb',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'icon_bread_color',
	'label'       => __( 'Breadcrumb Icon Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#111827',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content ul.finest-breadcrumb li span.dashicons',
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
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-single-content ul.finest-breadcrumb li span.dashicons',
			'function' => 'css',
			'property' => 'font-size',
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
	'label'       => esc_html__( 'Toc Area Width', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 25,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'table_area_backgound',
	'label'       => __( 'Toc Background Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'docs_table_padding',
	'label'       => esc_html__( 'Toc Area Padding', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => [
		'padding-top'    => '45px',
		'padding-right' => '30px',
		'padding-bottom'   => '45px',
		'padding-left'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'table_content_radius',
	'label'       => esc_html__( 'Toc Area Radius', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 0,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'toc_title_color',
	'label'       => __( 'Toc Title Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 'color: rgba(0, 0, 0, 0.4);',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap .autoc h2',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'toc_title_font_size',
	'label'       => esc_html__( 'Toc Font Size', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 13,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap .autoc h2',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'toc_title_bottom',
	'label'       => esc_html__( 'Toc Margin Bottom', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 10,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap .autoc h2',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'table_title_font_size',
	'label'       => esc_html__( 'Title Size', 'finest-docs' ),
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
			'element'  => '.finest-autoc-wrap .autoc ul li a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'table_title_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#000000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap .autoc ul li a',
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
	'default'     => '#000000',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap .autoc ul li a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'table_title_margin_bottom',
	'label'       => esc_html__( 'Title Gap', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-autoc-wrap .autoc ul li',
			'function' => 'css',
			'property' => 'padding-bottom',
			'units'    => 'px',
		],
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

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'footer_box',
	'section'     => 'single_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Footer Contact Button', 'finest-mini-cart' ) . '</h3>',
	'priority'    => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'     => 'link',
	'settings' => 'contact_url_page',
	'label'    => __( 'Link Control', 'kirki' ),
	'section'  => 'single_page',
	'default'  => 'http://example.com/',
	'priority' => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'footer_button_width',
	'label'       => esc_html__( 'Button Width', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 162,
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-entry-footer .footer-button a',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
] );
Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'footer_button_height',
	'label'       => esc_html__( 'Button Height', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 45,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-entry-footer .footer-button a',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'button_bg_color',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#4A3BFD',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-entry-footer .footer-button a',
			'function' => 'css',
			'property' => 'background-color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'button_font_size',
	'label'       => esc_html__( 'Font Size', 'finest-docs' ),
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
			'element'  => '.fddocs-entry-footer .footer-button a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'button_text_color',
	'label'       => __( 'Text Color', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => '#ffffff;',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-entry-footer .footer-button a',
			'function' => 'css',
			'property' => 'color',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'fbutton_border_radius',
	'label'       => esc_html__( 'Border Radius', 'finest-docs' ),
	'section'     => 'single_page',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-entry-footer .footer-button a',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
] );