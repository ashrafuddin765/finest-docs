<?php
Kirki::add_section( 'docs_global', array(
	'title'          => esc_html__( 'Global Option', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );

// Typography 

Kirki::add_field( 'docs_panel', [
	'type'        => 'typography',
	'settings'    => 'typography_setting',
	'label'       => esc_html__( 'Control Label', 'finest-docs' ),
	'section'     => 'docs_global',
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	
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
