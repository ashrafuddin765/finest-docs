<?php
Kirki::add_section( 'doc_sidebar', array(
	'title'          => esc_html__( 'Sidebar Option', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );


// mmodal content
Kirki::add_field( 'docs_panel', [
	'type'        => 'select',
	'settings'    => 'sidebar_settings_area',
	'label'       => esc_html__( 'Sidebar Left Or Right', 'finest-docs' ),
	'section'     => 'doc_sidebar',
	'default'     => 'left',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'Left', 'finest-docs' ),
		'right' => esc_html__( 'Right', 'finest-docs' ),
		'none' => esc_html__( 'None', 'finest-docs' ),
		
	],
	
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-image',
	'settings'    => 'sidebAR_LAYOUT',
	'label'       => esc_html__( 'Radio Control (Image)', 'kirki' ),
	'section'     => 'doc_sidebar',
	'default'     => 'left',
	'priority'    => 10,
	'choices'     => [
		'left'   => 'http://finestwp.local/wp-content/plugins/betterdocs/admin/assets/img/docs-layout-1.png',
		'center' => get_template_directory_uri() . '/assets/images/center.png',
		'right'  => get_template_directory_uri() . '/assets/images/right.png',
	],
] );