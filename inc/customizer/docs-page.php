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
	'settings'    => 'slider_setting',
	'label'       => esc_html__( 'Content Area Width', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 75,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
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
] );

// padding

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'content_area_padding',
	'label'       => esc_html__( 'Padding', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => 'px',
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
	'default'     => 10,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );