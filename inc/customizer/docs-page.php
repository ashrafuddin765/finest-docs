<?php

Kirki::add_section( 'docs_page', array(
	'title'          => esc_html__( 'Docs Page', 'finest-docs' ),
	'panel'          => 'docs_panel',
	'priority'       => 100,
) );

Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'docs_design_layout',
	'label'       => esc_html__( ' ', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'general',
	'priority'    => 10,
	'choices'     => [
		'design' => esc_html__( 'Layout', 'finest-docs' ),
		'general'   => esc_html__( 'Design', 'finest-docs' ),
	],
] );


// docs layout

Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-image',
	'settings'    => 'docs_layout_design',
	'label'       => esc_html__( 'Select Single Doc Layout', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'docs-template-01',
	'priority'    => 10,
	'choices'     => [
		'docs-template-01'   => FINEST_DOCS_ASSETS_ASSETS . 'docs-layout-01.png',
		'docs-template-02' => FINEST_DOCS_ASSETS_ASSETS . 'docs-layout-02.png',
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'design',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'header_top',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Text', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'design',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'     => 'text',
	'settings' => 'fd_docs_tilte',
	'label'    => esc_html__( 'Doc Title', 'finest-docs' ),
	'section'  => 'docs_page',
	'default'  => esc_html__( 'FinestDevs Products', 'finest-docs' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'docs_design_layout',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'docs_panel', [
	'type'     => 'textarea',
	'settings' => 'docs_description',
	'label'    => esc_html__( 'Doc Description', 'finest-docs' ),
	'section'  => 'docs_page',
	'default'  => esc_html__( 'You Can Search For A Question Here. It Will Help You Get The Most Common Anwers Easily..', 'finest-docs' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'docs_design_layout',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );



Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'header_top',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Header', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_head_title_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.doc-header-title h1',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
    'type'            => 'slider',
    'settings'        => 'doc_title_font_size',
    'label'           => esc_html__( 'Title Font Size', 'finest-docs' ),
    'section'         => 'docs_archive',
    'default'         => 42,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.doc-header-title h1',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'docs_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'docs_panel', [
    'type'            => 'slider',
    'settings'        => 'doc_sec_title_gap',
    'label'           => esc_html__( 'Title Gap', 'finest-docs' ),
    'section'         => 'docs_archive',
    'default'         => 15,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.doc-header-title h1',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'docs_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_head_desc_color',
	'label'       => __( 'Description Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.doc-header-desc p',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
    'type'            => 'slider',
    'settings'        => 'doc_desc_font_size',
    'label'           => esc_html__( 'Description Font Size', 'finest-docs' ),
    'section'         => 'docs_archive',
    'default'         => 18,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.doc-header-desc p',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'docs_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'doc_area_body',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Body', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// background color
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'single_area_backgound',
	'label'       => __( 'Content Area Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#F3F5F7',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
	
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'docs_content_padding',
	'label'       => esc_html__( 'Contnet Area Padding', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '95px',
		'padding-left' => '0px',
		'padding-bottom'   => '115px',
		'padding-right'  => '0px',
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
	
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_column_settings',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __( 'CATEGORY COLUMN SETTINGS
        ', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );


// Column hover Background Color
Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'column_hover_normal',
	'label'       => esc_html__( 'Column Normal', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'normal',
	'priority'    => 10,
	'choices'     => [
		'normal'   => esc_html__( 'Normal', 'finest-docs' ),
		'hover' => esc_html__( 'Hover', 'finest-docs' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'column_background_color',
	'label'       => __( 'Column Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column padding
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'column_normal_padding',
	'label'       => esc_html__( 'Column Padding', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-left' => '0px',
		'padding-bottom'   => '0px',
		'padding-right'  => '0px',
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column border

Kirki::add_field( 'docs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'border_width_setting',
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
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
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
			'element'  => '.fddocs-site-main .docs-wraper',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
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
			'element'  => '.fddocs-site-main .docs-wraper',
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
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
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
			'element'  => '.fddocs-site-main .docs-wraper',
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
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


// column hover

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'column_hover_bg_color',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column padding
Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'column_hover_padding',
	'label'       => esc_html__( 'Column Padding', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '0px',
		'padding-left' => '0px',
		'padding-bottom'   => '0px',
		'padding-right'  => '0px',
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// column border

Kirki::add_field( 'docs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'hover_border_width_setting',
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
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'docs_panel', [
	'type'        => 'select',
	'settings'    => 'hover_border_type',
	'label'       => esc_html__( 'Border Type', 'kirki' ),
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
			'element'  => '.fddocs-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'hover_border_color',
	'label'       => __( 'Border Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(45, 45, 49, 0.12)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'hover_border_radius',
	'label'       => esc_html__( 'Border Radius', 'finest-docs' ),
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
			'element'  => '.fddocs-site-main .docs-wraper:hover',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_content_settings',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Content', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_thumbnail_width',
	'label'       => esc_html__( 'Doc Thumbnail Width', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 100,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-top .card-title img',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_thumbnail_height',
	'label'       => esc_html__( 'Doc Thumbnail Height', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 190,
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-top .card-title img',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
    
] ); 

// content area
Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'contetn_column_hover_normal',
	'label'       => esc_html__( 'Doc Content', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'normal',
	'priority'    => 10,
	'choices'     => [
		'normal'   => esc_html__( 'Normal', 'finest-docs' ),
		'hover' => esc_html__( 'Hover', 'finest-docs' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
// background color
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_content_area_bg',
	'label'       => __( 'Content Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
		
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'text_content_padding',
	'label'       => esc_html__( 'Contnet Padding', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '25px',
		'padding-left' => '35px',
		'padding-bottom'   => '40px',
		'padding-right'  => '35px',
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
	
] );

//doc title font size
Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_title_font_size',
	'label'       => esc_html__( 'Doc Title Font Size', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 21,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-content-title h1',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_title_font_color',
	'label'       => __( 'Doc Title Font Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-content-title h1',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_title_gap',
	'label'       => esc_html__( 'Title Gap', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-content-title h1',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


// Doc Description
Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_decription_font_size',
	'label'       => esc_html__( 'Doc Description Font Size', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-content p',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_description_color',
	'label'       => __( 'Doc Dessciption Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-content p',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );



// contetn hover area
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_hover_content_area_bg',
	'label'       => __( 'Content Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom:hover',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'text_hover_padding',
	'label'       => esc_html__( 'Contnet Padding', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => [
		'padding-top'    => '25px',
		'padding-left' => '35px',
		'padding-bottom'   => '40px',
		'padding-right'  => '35px',
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
	
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'hover_title_font_color',
	'label'       => __( 'Hover Title Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-content-title h1:hover',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'contetn_column_hover_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_button_settings',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __('Doc Button', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
	
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'doc_button_normal',
	'label'       => esc_html__( 'Doc Button', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'normal',
	'priority'    => 10,
	'choices'     => [
		'normal'   => esc_html__( 'Normal', 'finest-docs' ),
		'hover' => esc_html__( 'Hover', 'finest-docs' ),
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_button_font_size',
	'label'       => esc_html__( 'Button Font Size', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_font_color',
	'label'       => __( 'Doc Font Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_button_width',
	'label'       => esc_html__( 'Button Width', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 150,
	'choices'     => [
		'min'  => 0,
		'max'  => 500,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_button_height',
	'label'       => esc_html__( 'Button Height', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
		
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] ); 

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_button_bg_color',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(22, 22, 23, 0.06)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
Kirki::add_field( 'docs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'button_width_setting',
	'label'       => esc_attr__( 'Button Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'default'     => [
		'top-width'    => '0px',
		'right-width'  => '0px',
		'bottom-width' => '0px',
		'left-width'   => '0px',
	],
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'docs_panel', [
	'type'        => 'select',
	'settings'    => 'button_border_type',
	'label'       => esc_html__( 'Button Border Type', 'kirki' ),
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
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'button_border_color',
	'label'       => __( 'Button Border Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#fffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'button_border_radius',
	'label'       => esc_html__( 'Border Radius', 'finest-docs' ),
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
			'element'  => '.fddocs-site-main .card-bottom .card-button a',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'normal',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


// button hover


Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'hover_doc_font_color',
	'label'       => __( 'Doc Font Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
 
Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'hover_button_bg_color',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );
Kirki::add_field( 'docs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'hover_border_button_width',
	'label'       => esc_attr__( 'Button Border Width', 'textdomain' ),
	'section'     => 'docs_page',
	'default'     => [
		'top-width'    => '0px',
		'right-width'  => '0px',
		'bottom-width' => '0px',
		'left-width'   => '0px',
	],
	'choices'     => [
		'top-width'    => esc_attr__( 'Top', 'textdomain' ),
		'right-width'  => esc_attr__( 'Bottom', 'textdomain' ),
		'bottom-width' => esc_attr__( 'Left', 'textdomain' ),
		'left-width'   => esc_attr__( 'Right', 'textdomain' ),
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
) );

// border type

Kirki::add_field( 'docs_panel', [
	'type'        => 'select',
	'settings'    => 'hover_button_border_type',
	'label'       => esc_html__( 'Button Border Type', 'kirki' ),
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
			'element'  => '.fddocs-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

// border-color

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'hover_button_border_color',
	'label'       => __( 'Button Border Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => '#fff',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );

//colum radius

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'button_hover_border_radius',
	'label'       => esc_html__( 'Border Radius', 'finest-docs' ),
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
			'element'  => '.fddocs-site-main .card-bottom .card-button a:hover',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'doc_button_normal',
			'operator' => '===',
			'value'    => 'hover',
		],
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	],
] );


Kirki::add_field( 'docs_panel', [
	'type'        => 'custom',
	'settings'    => 'docs_item_counter',
	'section'     => 'docs_page',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 12px; background:#ddd; color:#222; margin:0;">' . __('Doc Item Counter', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'slider',
	'settings'    => 'doc_count_font_size',
	'label'       => esc_html__( 'Font Size', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-templatetwo .docs-article .docs-article-total',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
    
] );

Kirki::add_field( 'docs_panel', [
	'type'        => 'color',
	'settings'    => 'doc_item_count_color',
	'label'       => __( 'Item Count Color', 'finest-docs' ),
	'section'     => 'docs_page',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-templatetwo .docs-article .docs-article-total',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'docs_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
    
] );
