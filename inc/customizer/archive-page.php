<?php
Kirki::add_section( 'docs_archive', array(
	'title'          => esc_html__( 'Archive Page', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );


// background color
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'ac=rchive_area_backgound',
	'label'       => __( 'Content Area Background Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
] );

// padding

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'archive_area_padding',
	'label'       => esc_html__( 'Padding', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => 'px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
] );

// margin

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'content_area_padding',
	'label'       => esc_html__( 'Margin', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => [
		'margin-top'    => '0px',
		'margin-bottom' => 'px',
		'margin-left'   => '0px',
		'margin-right'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'archive_title_color',
	'label'       => __( 'Archive Title Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'archive_title_font_size',
	'label'       => esc_html__( 'Archive Title Font Size', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'archive_title_margin',
	'label'       => esc_html__( 'Dimension Control', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'archive_desc_color',
	'label'       => __( 'Description Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'archive_desc_font_size',
	'label'       => esc_html__( 'Description Font size', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'archive_desc_margin',
	'label'       => esc_html__( 'Archive Description Margin', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
] );