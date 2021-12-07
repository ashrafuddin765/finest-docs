<?php
Kirki::add_section( 'docs_page', array(
	'title'          => esc_html__( 'Docs Page Option', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );

// category layout

Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-image',
	'settings'    => 'docs_category_layout',
	'label'       => esc_html__( 'Select Category Layout', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'left',
	'priority'    => 10,
	'choices'     => [
		'left'   => get_template_directory_uri() . '/assets/images/left.png',
		'center' => get_template_directory_uri() . '/assets/images/center.png',
		'right'  => get_template_directory_uri() . '/assets/images/right.png',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'docs_page_width',
	'label'       => esc_html__( 'Content Area Width', 'finest-docs' ),
	'section'     => 'docs_page',
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
	'section'     => 'docs_page',
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
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
] );

// border_radius
Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'content_area_radius',
	'label'       => esc_html__( 'Radius', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 0,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.ast-separate-container .finest-docs.ast-article-single:not(.ast-related-post)',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	]
] );