<?php
Kirki::add_section( 'docs_archive', array(
	'title'          => esc_html__( 'Section Page', 'finest-docs' ),
	'panel'          => 'fddocs_panel',
	'priority'       => 160,
) );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'section_design_layout',
	'label'       => esc_html__( ' ', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 'general',
	'priority'    => 10,
	'choices'     => [
		'design' => esc_html__( 'Layout', 'finest-docs' ),
		'general'   => esc_html__( 'Design ', 'finest-docs' ),
	],
] );

Kirki::add_field( 'fddocs_panel', [
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
		
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'design',
		],
	]

]);


Kirki::add_field( 'fddocs_panel', [
	'type'     => 'textarea',
	'settings' => 'section_description',
	'label'    => esc_html__( 'Section Description', 'finest-docs' ),
	'section'  => 'docs_archive',
	'default'  => esc_html__( 'You can search for a question here. It will help you get the most common anwers easily.', 'finest-docs' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'section_design_layout',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'header_top',
	'section'     => 'docs_archive',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Header', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'head_sec_title_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#ffffff',
	'choices'     => [
		'alpha' => true,
	],
	'transport'       => 'auto',
	'output' =>[
		[
			'element'  => '.section-title h1',
			'property' => 'color',
		],
		
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'sechead_title_font_size',
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
            'element'  => '.section-title h1',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'section_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'sechead_title_gap',
    'label'           => esc_html__( 'Title Gap', 'finest-docs' ),
    'section'         => 'docs_archive',
    'default'         => 20,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.section-title h1',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'section_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'head_desc_color',
	'label'       => __( 'Description Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 'rgba(255, 255, 255, 0.9)',
	'choices'     => [
		'alpha' => true,
	],
	'output' =>[
		[
			'element'  => '.section-desc p',
			'property' => 'color',
		],
		
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'sechead_desc_font_size',
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
            'element'  => '.section-desc p',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'section_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'sechead_desc_gap',
    'label'           => esc_html__( 'Description Gap', 'finest-docs' ),
    'section'         => 'docs_archive',
    'default'         => 40,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.section-desc p',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'section_design_layout',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'section_area',
	'section'     => 'docs_archive',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Section Area', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// background color
Kirki::add_field( 'fddocs_panel', [
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
			'element'  => '.fddocs-site-main .wraper',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// border

Kirki::add_field( 'fddocs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'section_border_setting',
	'label'       => esc_attr__( 'Content area Border Width', 'textdomain' ),
	'section'     => 'docs_archive',
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
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
) );

// border type

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'select',
	'settings'    => 'section_border_type',
	'label'       => esc_html__( 'Content area Border Type', 'kirki' ),
	'section'     => 'docs_archive',
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
			'element'  => '.fddocs-site-main .wraper',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
    
] );

// border-color

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'section_border_color',
	'label'       => __( 'Border Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 'rgba(45, 45, 49, 0.12)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .wraper',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// padding
Kirki::add_field( 'fddocs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'archive_area_padding',
	'label'       => esc_html__( 'Section Padding', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => [
		'padding-top'    => '0px',
		'padding-bottom' => 'px',
		'padding-left'   => '0px',
		'padding-right'  => '0px',
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// radius

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'section_border_radius',
	'label'       => esc_html__( 'Content Border Radius', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 5,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .wraper',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// section-thumbnail

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'section_top',
	'section'     => 'docs_archive',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Thumbnail', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'section_thumbnail_width',
	'label'       => esc_html__( 'Width', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 100,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .top-iocn',
			'function' => 'css',
			'property' => 'width',
			'units'    => '%',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'section_thumbnail_height',
	'label'       => esc_html__( 'Height', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 188,
	'choices'     => [
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .top-iocn',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'thum_area_backgound',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#F3F2F8',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .top-iocn',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'icon_bg_width',
	'label'       => esc_html__( 'Icon background Width', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 90,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .icon.icon-one',
			'function' => 'css',
			'property' => 'width',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'icon_bg_height',
	'label'       => esc_html__( 'Icon Background Height', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 90,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .icon.icon-one',
			'function' => 'css',
			'property' => 'height',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'icon_area_backgound',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#FFFFFF',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .icon.icon-one',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', array(
	'type'        => 'dimensions',
	'settings'    => 'icon_border_setting',
	'label'       => esc_attr__( 'Border Width', 'textdomain' ),
	'section'     => 'docs_archive',
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
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
) );

// border type
Kirki::add_field( 'fddocs_panel', [
	'type'        => 'select',
	'settings'    => 'icob_border_type',
	'label'       => esc_html__( 'Content area Border Type', 'kirki' ),
	'section'     => 'docs_archive',
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
			'element'  => '.fddocs-site-main .icon.icon-one',
			'function' => 'css',
			'property' => 'border-style',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

// border-color
Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'icon_border_color',
	'label'       => __( 'Border Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 'rgba(45, 45, 49, 0.12)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .icon.icon-one',
			'function' => 'css',
			'property' => 'border-color',
		],
	],
    'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'icon_border_radius',
	'label'       => esc_html__( 'Border Radius', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .icon.icon-one',
			'function' => 'css',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'doc_content_top',
	'section'     => 'docs_archive',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Doc Content', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'section_content_bg',
	'label'       => __( 'Background Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#FFFFFF',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .content-area',
			'function' => 'css',
			'property' => 'background-color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'dimensions',
	'settings'    => 'doc_sec_content_padding',
	'label'       => esc_html__( 'Content Padding', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => [
		'padding-top'    => '30px',
		'padding-bottom' => '35px',
		'padding-left'   => '35px',
		'padding-right'  => '35px',
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'archive_title_font_size',
	'label'       => esc_html__( 'Title Font Size', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 21,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-title h1',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'section_title_color',
	'label'       => __( 'Title Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#161617',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-title h1',
			'function' => 'css',
			'property' => 'color',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'section_title_gap',
	'label'       => esc_html__( 'Title Gap', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 10,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-title h1',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'archive_desc_font_size',
	'label'       => esc_html__( 'Description Font size', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-excerpt p',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'archive_desc_color',
	'label'       => __( 'Description Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 'rgba(0, 0, 0, 0.7)',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-excerpt p',
			'function' => 'css',
			'property' => 'color',
			
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'description_gap',
	'label'       => esc_html__( 'Description Gap', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 30,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .docs-excerpt p',
			'function' => 'css',
			'property' => 'margin-bottom',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'custom',
	'settings'    => 'section_total_count',
	'section'     => 'docs_archive',
		'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Section total Article', 'fddocs-mini-cart' ) . '</h3>',
	'priority'    => 10,
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );


Kirki::add_field( 'fddocs_panel', [
	'type'        => 'slider',
	'settings'    => 'total_article_font_size',
	'label'       => esc_html__( 'Font size', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .total-article .article-total',
			'function' => 'css',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );

Kirki::add_field( 'fddocs_panel', [
	'type'        => 'color',
	'settings'    => 'article_totle_color',
	'label'       => __( 'Total article Color', 'finest-docs' ),
	'section'     => 'docs_archive',
	'default'     => '#4A3BFD',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.fddocs-site-main .total-article .article-total',
			'function' => 'css',
			'property' => 'color',
			
		],
	],
	'active_callback'  => [
		[
			'setting'  => 'section_design_layout',
			'operator' => '===',
			'value'    => 'general',
		],
	]
] );



