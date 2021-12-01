<?php
Kirki::add_section( 'general_settings', array(
	'title'          => esc_html__( 'General Option', 'finest-mini-cart' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );


// mmodal content
Kirki::add_field( 'docs_panel', [
	'type'        => 'select',
	'settings'    => 'sidebar_settings_area',
	'label'       => esc_html__( 'Sidebar Left Or Right', 'finest-docs' ),
	'section'     => 'general_settings',
	'default'     => 'option-1',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'Left', 'finest-docs' ),
		'right' => esc_html__( 'Right', 'finest-docs' ),
		
	],
] );



