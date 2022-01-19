<?php
Kirki::add_section( 'single_page', array(
    'title'    => esc_html__( 'Single Docs Page', 'finest-docs' ),
    'panel'    => 'fddocs_panel',
    'priority' => 160,
) );

// category layout

Kirki::add_field( 'fddocs_panel', [
    'type'     => 'radio-buttonset',
    'settings' => 'single_layout_design',
    'label'    => esc_html__( ' ', 'finest-docs' ),
    'section'  => 'single_page',
    'default'  => 'design',
    'priority' => 10,
    'choices'  => [
        'design'  => esc_html__( 'Layout', 'finest-docs' ),
        'general' => esc_html__( 'Design ', 'finest-docs' ),

    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'radio-image',
    'settings'        => 'docs_category_layout',
    'label'           => esc_html__( 'Select Single Doc Layout', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'layout-01',
    'priority'        => 10,
    'choices'         => [
        'layout-01' => FINEST_DOCS_ASSETS_ASSETS . 'layout-1.png',
        'layout-02' => FINEST_DOCS_ASSETS_ASSETS . 'layout-2.png',
        'layout-03' => FINEST_DOCS_ASSETS_ASSETS . 'layout-3.png',
        'layout-04' => FINEST_DOCS_ASSETS_ASSETS . 'layout-4.png',

    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'single_cta_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'CTA', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'     => 'text',
	'settings' => 'cta_title',
	'label'    => esc_html__( 'Title', 'finest-docs' ),
	'section'  => 'single_page',
	'default'  => esc_html__( 'Still no luck? We can help!', 'finest-docs' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'     => 'textarea',
	'settings' => 'cta_description',
	'label'    => esc_html__( 'Description', 'finest-docs' ),
	'section'  => 'single_page',
	'default'  => esc_html__( 'Contact us and we’ll get back to you as soon as possible', 'finest-docs' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
	'type'     => 'text',
	'settings' => 'cta_button_text',
	'label'    => esc_html__( 'Button Text', 'finest-docs' ),
	'section'  => 'single_page',
	'default'  => esc_html__( 'Contact support', 'finest-docs' ),
	'priority' => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
    
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'link',
    'settings'        => 'contact_url_page',
    'label'           => __( 'CTA', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'http://example.com/',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'design',
        ],
    ],
] );



// background color
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'doc_area_backgound',
    'label'           => __( 'Content Area Background Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#F3F5F7',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-wrap',
            'function' => 'css',
            'property' => 'background-color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// padding
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'dimensions',
    'settings'        => 'content_padding',
    'label'           => esc_html__( 'Contnet Area Padding', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => [
        'padding-top'    => '0px',
        'padding-left'   => '0px',
        'padding-bottom' => '0px',
        'padding-right'  => '0px',
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// background color
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'content_area_backgound',
    'label'           => __( 'Article Area Background Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#ffffff',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-wrap .fddocs-single-content',
            'function' => 'css',
            'property' => 'background-color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// padding
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'dimensions',
    'settings'        => 'docs_padding',
    'label'           => esc_html__( 'Article Padding', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => [
        'padding-top'    => '45px',
        'padding-left'   => '45px',
        'padding-bottom' => '190px',
        'padding-right'  => '45px',
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// post title

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'title_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Post Title', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'post_title_font_size',
    'label'           => esc_html__( 'Title Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 28,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content .fddocs-entry-content h2',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'post_title_color',
    'label'           => __( 'Post Title Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#000',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content .fddocs-entry-content h2',
            'function' => 'css',
            'property' => 'color',

        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// title margin
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'dimensions',
    'settings'        => 'post_title_margin',
    'label'           => esc_html__( 'Margin', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => [
        'margin-top'    => '0px',
        'margin-right'  => '0px',
        'margin-bottom' => '0px',
        'margin-left'   => '0px',
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'post_title_title_margin',
    'label'           => esc_html__( 'Title Margin', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 15,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content .fddocs-entry-content h2',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

//entry content

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'content_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Entry Content', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'entry_font_size',
    'label'           => esc_html__( 'Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 16,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content .fddocs-entry-content p',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'content_desc_color',
    'label'           => __( 'Content Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'rgba(0, 0, 0, 0.7)',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content .fddocs-entry-content p',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'entry_margin_bottom',
    'label'           => esc_html__( 'Margin Bottom', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 35,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content .fddocs-entry-content p',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'breadcrumb_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Breadcrumb', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'bradcrumb_font_size',
    'label'           => esc_html__( 'Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 15,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content ul.fddocs-breadcrumb li a,
			.fddocs-single-content ul.fddocs-breadcrumb li .current',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'bread_font_color',
    'label'           => __( 'Breadcrumb Font Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'rgba(22, 22, 23, 0.6)',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content ul.fddocs-breadcrumb li a',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'hover_bread_color',
    'label'           => __( 'Breadcrumb Hover Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#000',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content ul.fddocs-breadcrumb li a:hover',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'active_bread_color',
    'label'           => __( 'Breadcrumb Active Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#4A3BFD',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content ul.fddocs-breadcrumb li .current',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'bradcrumb_margin',
    'label'           => esc_html__( 'Margin Bottom', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 35,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-wrap .fddocs-single-content ul.fddocs-breadcrumb',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'icon_bread_color',
    'label'           => __( 'Breadcrumb Icon Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'rgba(22, 22, 23, 0.6)',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content ul.fddocs-breadcrumb li span.dashicons',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'bread_icon_size',
    'label'           => esc_html__( 'Breadcrumb Icon Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 16,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-single-content ul.fddocs-breadcrumb li span.dashicons',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'table_contents_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Table Of Contents', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'table_area_backgound',
    'label'           => __( 'TOC Background Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#ffffff',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap',
            'function' => 'css',
            'property' => 'background-color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'dimensions',
    'settings'        => 'docs_table_padding',
    'label'           => esc_html__( 'TOC Area Padding', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => [
        'padding-top'    => '45px',
        'padding-right'  => '30px',
        'padding-bottom' => '45px',
        'padding-left'   => '0px',
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'table_content_radius',
    'label'           => esc_html__( 'TOC Area Radius', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 0,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap',
            'function' => 'css',
            'property' => 'border-radius',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'toc_title_color',
    'label'           => __( 'TOC Title Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'color: rgba(0, 0, 0, 0.4);',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc h2',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'toc_title_font_size',
    'label'           => esc_html__( 'TOC Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 13,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc h2',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'toc_title_bottom',
    'label'           => esc_html__( 'TOC Margin Bottom', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 10,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc h2',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'table_title_font_size',
    'label'           => esc_html__( 'TOC Title Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 18,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc ul li a',
            'function' => 'css',
            'property' => 'TOC Font Size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'table_title_color',
    'label'           => __( 'TOC Title Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#000000',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc ul li a',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'table_title_hover_color',
    'label'           => __( 'TOC Title Hover Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#000000',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc ul li a:hover',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'table_title_margin_bottom',
    'label'           => esc_html__( 'TOC Title Gap', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 15,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-autoc-wrap .autoc ul li',
            'function' => 'css',
            'property' => 'padding-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'social_share_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Social Share', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'switch',
    'settings'        => 'switch_social_share',
    'label'           => esc_html__( 'Enable Social Share', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'on',
    'priority'        => 10,
    'choices'         => [
        'on'  => esc_html__( 'Enable', 'finest-docs' ),
        'off' => esc_html__( 'Disable', 'finest-docs' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'text',
    'settings'        => 'social_share_ttile',
    'label'           => esc_html__( 'Social Share Title', 'finest-docs' ),
    'default'         => esc_html__( 'Social Share', 'finest-docs' ),
    'section'         => 'single_page',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'social_title_color',
    'label'           => __( 'Social Title Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#3a3a3a',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-socshare-heading h5',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'social_title_font_size',
    'label'           => esc_html__( 'Social Title Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 18,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-socshare-heading h5',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'social_title_gap',
    'label'           => esc_html__( 'Title Gap', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 0,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-socshare-heading h5',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'switch',
    'settings'        => 'switch_facebook_share',
    'label'           => esc_html__( 'Enable Facebook Share', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'on',
    'priority'        => 10,
    'choices'         => [
        'on'  => esc_html__( 'Enable', 'finest-docs' ),
        'off' => esc_html__( 'Disable', 'finest-docs' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],

] );
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'switch',
    'settings'        => 'enable_Twitter_sharing',
    'label'           => esc_html__( 'Enable Twitter Sharing', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'on',
    'priority'        => 10,
    'choices'         => [
        'on'  => esc_html__( 'Enable', 'finest-docs' ),
        'off' => esc_html__( 'Disable', 'finest-docs' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'switch',
    'settings'        => 'enable_linkedin_sharing',
    'label'           => esc_html__( 'Enable Linkedin Sharing', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'on',
    'priority'        => 10,
    'choices'         => [
        'on'  => esc_html__( 'Enable', 'finest-docs' ),
        'off' => esc_html__( 'Disable', 'finest-docs' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );
Kirki::add_field( 'fddocs_panel', [
    'type'            => 'switch',
    'settings'        => 'enable_pinterest_sharing',
    'label'           => esc_html__( 'Enable Pinterest Sharing', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'on',
    'priority'        => 10,
    'choices'         => [
        'on'  => esc_html__( 'Enable', 'finest-docs' ),
        'off' => esc_html__( 'Disable', 'finest-docs' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'icon_width_height',
    'label'           => esc_html__( 'Icon Width Height', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 35,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fddocs-social-share ul.fddocs-social-share-links li a img',
            'function' => 'css',
            'property' => 'width',
            'units'    => 'px',
        ],
        [
            'element'  => '.fddocs-social-share ul.fddocs-social-share-links li a img',
            'function' => 'css',
            'property' => 'height',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'custom',
    'settings'        => 'footer_box',
    'section'         => 'single_page',
    'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'CTA Button', 'fddocs-mini-cart' ) . '</h3>',
    'priority'        => 10,
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// cta title

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'cta_title_color',
    'label'           => __( 'CTA Title Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#000000',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-ctn .footer-content h3',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'cta_title_font_size',
    'label'           => esc_html__( 'CTA Title Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 16,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-ctn .footer-content h3',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'cta_title_gap',
    'label'           => esc_html__( 'CTA Title Gap', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 5,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-ctn .footer-content h3',
            'function' => 'css',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

// cta desc

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'cta_desc_color',
    'label'           => __( 'CTA Description Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 'rgba(0, 0, 0, 0.7)',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-ctn .footer-content p',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'cta_desc_font_size',
    'label'           => esc_html__( 'CTA Decription Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 14,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-ctn .footer-content p',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );



Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'button_bg_color',
    'label'           => __( 'Button Background Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-cta a',
            'function' => 'css',
            'property' => 'background-color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'button_font_size',
    'label'           => esc_html__( 'Button Font Size', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 16,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-cta a',
            'function' => 'css',
            'property' => 'font-size',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'color',
    'settings'        => 'button_text_color',
    'label'           => __( 'Button Text Color', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => '#ffffff;',
    'choices'         => [
        'alpha' => true,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-cta a',
            'function' => 'css',
            'property' => 'color',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );

Kirki::add_field( 'fddocs_panel', [
    'type'            => 'slider',
    'settings'        => 'fbutton_border_radius',
    'label'           => esc_html__( 'Button Border Radius', 'finest-docs' ),
    'section'         => 'single_page',
    'default'         => 5,
    'choices'         => [
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ],
    'transport'       => 'postMessage',
    'js_vars'         => [
        [
            'element'  => '.fdocs-cta a',
            'function' => 'css',
            'property' => 'border-radius',
            'units'    => 'px',
        ],
    ],
    'active_callback' => [
        [
            'setting'  => 'single_layout_design',
            'operator' => '===',
            'value'    => 'general',
        ],
    ],
] );