<?php
Kirki::add_section( 'docs_global', array(
	'title'          => esc_html__( 'Global Option', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );


Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'docs_page_width',
	'label'       => esc_html__( 'Container Width', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => 1300,
	'choices'     => [
		'min'  => 1170,
		'max'  => 2500,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-container',
			'function' => 'css',
			'property' => 'max-width',
			'units'    => 'px',
		],
	],	

] );

// Typography 

Kirki::add_field( 'docs_panel', [
	'type'        => 'typography',
	'settings'    => 'finest_typography_setting',
	'label'       => esc_html__( 'Control Label', 'kirki' ),
	'section'     => 'section_id',
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => __( 'Primary Color', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'secoudary_color',
	'label'       => __( 'Secondary Color', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => '#00ff00',
	'choices'     => [
		'alpha' => true,
	],
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'accent_color',
	'label'       => __( 'Accent Color', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => '#cc88cc',
	'choices'     => [
		'alpha' => true,
	],
] );

