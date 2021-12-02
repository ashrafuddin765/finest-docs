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

// border_radius
// border_radius
Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'archive_border_radius',
	'label'       => esc_html__( 'Radius', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 10,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );