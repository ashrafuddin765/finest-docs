<?php
Kirki::add_section( 'docs_serach', array(
	'title'          => esc_html__( 'Search', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );

Kirki::add_field( 'docs_panel', [
	'type'        => 'switch',
	'settings'    => 'switch_setting',
	'label'       => esc_html__( 'Search Heading', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'finest-docs' ),
		'off' => esc_html__( 'Disable', 'finest-docs' ),
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'     => 'text',
	'settings' => 'search_heading',
	'label'    => esc_html__( 'Heading', 'finest-docs' ),
	'section'  => 'docs_serach',
	'priority' => 10,
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'heading_font_size',
	'label'       => esc_html__( 'Heading Font size', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => 12,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'search_heading_color',
	'label'       => __( 'Search Heading Color', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'search_width',
	'label'       => esc_html__( 'Search Width', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'search_height',
	'label'       => esc_html__( 'Search Height', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'search_filed_color',
	'label'       => __( 'Search Text Color', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'search_field_size',
	'label'       => esc_html__( 'Search Field Font size', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => 10,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'search_bag_color',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'search_margin',
	'label'       => esc_html__( 'Margin', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => [
		'margin-top'    => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px',
		'margin-right'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'search_border_radius',
	'label'       => esc_html__( 'Border Radius', 'finest-docs' ),
	'section'     => 'docs_serach',
	'default'     => 10,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );