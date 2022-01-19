<?php
Kirki::add_section( 'docs_global', array(
	'title'          => esc_html__( 'Global Option', 'finest-docs' ),
	'panel'          => 'fddocs_panel',
	'priority'       => 160,
) );


Kirki::add_field( 'fddocs_panel', [
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
			'element'  => '.fddocs-container',
			'function' => 'css',
			'property' => 'max-width',
			'units'    => 'px',
		],
	],	

] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'fddoc_body_bg_color',
	'label'       => __( 'Body Background Color', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => '#FFFFFF',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'body.fddocs-body',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	
] );

// Typography 

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'typography',
	'settings'    => 'fddoc_typhography',
	'label'       => esc_html__( 'Typography', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '13px',
		'line-height'    => '1.5em',
		'text-transform' => 'capitalize',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'body_primary_color',
	'label'       => __( 'Color', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'body.fddocs-body',
			'function' => 'css',
			'property' => 'color',
		],
	],
	
] );


