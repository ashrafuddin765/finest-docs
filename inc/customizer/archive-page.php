<?php
Kirki::add_section( 'docs_archive', array(
	'title'          => esc_html__( 'Archive Page', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 160,
) );

Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-image',
	'settings'    => 'section_select_layout',
	'label'       => esc_html__( 'Section Doc Layout', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 'section-template-01',
	'priority'    => 10,
	'choices'     => [
		'section-template-01'   => FINEST_DOCS_ASSETS_ASSETS . 'section-layout-01.png',
		'section-template-02' => FINEST_DOCS_ASSETS_ASSETS . 'section-layout-02.png',
		'section-template-03' => FINEST_DOCS_ASSETS_ASSETS . 'section-layout-03.png',
		
	]

	]);
// background color
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'section_area_backgound',
	'label'       => __( 'Content Area Background Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-site-main .wraper',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
] );

// border

Kirki::add_field( 'docs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'section_border_setting',
	'label'       => esc_attr__( 'Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'default'     => [
		'top-width'    => '1px',
		'right-width'  => '1px',
		'bottom-width' => '1px',
		'left-width'   => '1px',
	],
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
) );

// border type

Kirki::add_field( 'docs_panel', [
	'type'        => 'select',
	'settings'    => 'select_border_type',
	'label'       => esc_html__( 'Column Border Type', 'kirki' ),
	'section'     => 'docs_page',
	'default'     => 'solid',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'none' => esc_html__( 'none', 'kirki' ),
		'hidden' => esc_html__( 'hidden', 'kirki' ),
		'dotted' => esc_html__( 'dotted', 'kirki' ),
		'dashed' => esc_html__( 'dashed', 'kirki' ),
		'solid' => esc_html__( 'solid', 'kirki' ),
		'double' => esc_html__( 'double', 'kirki' ),
		'groove' => esc_html__( 'groove', 'kirki' ),
		'ridge' => esc_html__( 'ridge', 'kirki' ),
		'inset' => esc_html__( 'inset', 'kirki' ),
		'outset' => esc_html__( 'outset', 'kirki' ),
		'initial' => esc_html__( 'initial', 'kirki' ),
		'inherit' => esc_html__( 'inherit', 'kirki' ),
	],
    'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-site-main .wraper',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    
] );

// border-color

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'column_border_color',
	'label'       => __( 'Column Border Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(45, 45, 49, 0.12)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
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



//colum radius

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'column_border_radius',
	'label'       => esc_html__( 'Column Border Radius', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
	],
] );

// section-thumbnail




Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'archive_title_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#0088CC',
	'choices'     => [
		'alpha' => true,
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'archive_title_font_size',
	'label'       => esc_html__( 'Title Font Size', 'finest-docs' ),
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