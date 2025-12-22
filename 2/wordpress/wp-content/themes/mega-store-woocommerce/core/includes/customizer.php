<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'mega_store_woocommerce_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'mega-store-woocommerce' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'mega-store-woocommerce' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'mega-store-woocommerce' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'mega_store_woocommerce_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'mega-store-woocommerce' ),
	) );

	Kirki::add_section( 'mega_store_woocommerce_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'mega-store-woocommerce' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_font_style_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. More Font Family Options </p><p>3. Color Pallete Setup </p><p>4. Section Reordering Facility</p><p>5. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_all_headings_typography',
		'section'     => 'mega_store_woocommerce_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'mega_store_woocommerce_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'mega-store-woocommerce' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_body_content_typography',
		'section'     => 'mega_store_woocommerce_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'mega_store_woocommerce_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'mega-store-woocommerce' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

		// PANEL
	Kirki::add_panel( 'mega_store_woocommerce_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'mega-store-woocommerce' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'mega_store_woocommerce_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'mega-store-woocommerce' ),
	    'priority'       => 2,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_section_animation',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_animation_enabled',
		'label'       => esc_html__( 'Turn To Show Animation', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	// PANEL
	Kirki::add_panel( 'mega_store_woocommerce_panel_id_2', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Dark Mode', 'mega-store-woocommerce' ),
	) );

	// DARK MODE SECTION
	Kirki::add_section( 'mega_store_woocommerce_section_dark_mode', array(
	    'title'          => esc_html__( 'Dark Mode', 'mega-store-woocommerce' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_section_dark_mode',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'mega_store_woocommerce_dark_colors',
	    'section'     => 'mega_store_woocommerce_section_dark_mode',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dark Appearance', 'mega-store-woocommerce' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_is_dark_mode_enabled',
		'label'       => esc_html__( 'Turn To Dark Mode', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_dark_mode',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );


	// PANEL
	Kirki::add_panel( 'mega_store_woocommerce_panel_id_3', array(
	    'priority'    => 10,
	    'title'       => esc_html__( '404 Settings', 'mega-store-woocommerce' ),
	) );

	// 404 SECTION
	Kirki::add_section( 'mega_store_woocommerce_section_404', array(
	    'title'          => esc_html__( '404 Settings', 'mega-store-woocommerce' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_section_404',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
		'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'mega_store_woocommerce_not_found_heading',
	    'section'     => 'mega_store_woocommerce_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Not Found Heading', 'mega-store-woocommerce' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'mega_store_woocommerce_404_page_title',
		'section'  => 'mega_store_woocommerce_section_404',
		'default'  => esc_html__('404 Not Found', 'mega-store-woocommerce'),
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'mega_store_woocommerce_not_found_text',
	    'section'     => 'mega_store_woocommerce_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Not Found Content', 'mega-store-woocommerce' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'mega_store_woocommerce_404_page_content',
		'section'  => 'mega_store_woocommerce_section_404',
		'default'  => esc_html__('Sorry, no posts matched your criteria.', 'mega-store-woocommerce'),
		'priority' => 10,
	] );

	// PANEL

	Kirki::add_panel( 'mega_store_woocommerce_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'mega-store-woocommerce' ),
	) );

	// COLOR SECTION

	Kirki::add_section( 'mega_store_woocommerce_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'mega-store-woocommerce' ),
	    'panel'          => 'mega_store_woocommerce_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
		'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_section_color',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_global_colors',
		'section'     => 'mega_store_woocommerce_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'mega_store_woocommerce_global_color',
		'label'       => __( 'choose your Appropriate Color', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_color',
		'default'     => '#0069df',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'mega_store_woocommerce_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_color',
		'default'     => '#e5a500',
	] );

	// Additional Settings

	Kirki::add_section( 'mega_store_woocommerce_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'mega-store-woocommerce' ),
	    'panel'          => 'mega_store_woocommerce_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_additional_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'mega_store_woocommerce_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'mega-store-woocommerce' ),
			'Center' => esc_html__( 'Center', 'mega-store-woocommerce' ),
			'Right'  => esc_html__( 'Right', 'mega-store-woocommerce' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'mega_store_woocommerce_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'mega-store-woocommerce' ),
		'section'  => 'mega_store_woocommerce_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_mega_store_woocommerce',
		'label'       => esc_html__( 'Menus Text Transform', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default'     => 'UPPERCASE',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'mega-store-woocommerce' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'mega-store-woocommerce' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'mega-store-woocommerce' ),

		],
	]);

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default' => 'None',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'None' => __('None','mega-store-woocommerce'),
            'Zoominn' => __('Zoom Inn','mega-store-woocommerce'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'mega_store_woocommerce_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_preloader_type',
		'label'       => esc_html__( 'Preloader Type', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default' => 'four-way-loader',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'four-way-loader' => __('Type 1','mega-store-woocommerce'),
            'cube-loader' => __('Type 2','mega-store-woocommerce'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','mega-store-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','mega-store-woocommerce'),
            'One Column' => __('One Column','mega-store-woocommerce')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'mega_store_woocommerce_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'mega-store-woocommerce' ),
		'panel'          => 'mega_store_woocommerce_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_woocommerce_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
	[
		'settings' => 'mega_store_woocommerce_per_columns',
		'label'    => esc_html__( 'Product Per Row', 'mega-store-woocommerce' ),
		'section'  => 'mega_store_woocommerce_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'mega_store_woocommerce_product_per_page',
		'label'    => esc_html__( 'Product Per Page', 'mega-store-woocommerce' ),
		'section'  => 'mega_store_woocommerce_woocommerce_settings',
		'default'  => 9,
		'choices'  => [
			'min'  => 1,
			'max'  => 15,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'mega-store-woocommerce' ),
		'section'  => 'mega_store_woocommerce_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'mega-store-woocommerce' ),
		'section'  => 'mega_store_woocommerce_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','mega-store-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','mega-store-woocommerce')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','mega-store-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','mega-store-woocommerce')
		],
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'mega_store_woocommerce_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'mega-store-woocommerce' ),
			'Center' => esc_html__( 'Center', 'mega-store-woocommerce' ),
			'Right'  => esc_html__( 'Right', 'mega-store-woocommerce' ),
		],
	]
	);
}

	// POST SECTION

	Kirki::add_section( 'mega_store_woocommerce_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'mega-store-woocommerce' ),
	    'panel'          => 'mega_store_woocommerce_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_section_post',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'mega_store_woocommerce_archive_element_sortable',
		'label'    => __( 'Archive Post Page Element Reordering', 'mega-store-woocommerce' ),
		'description'    => esc_html__( 'This setting is not favorable with post format.', 'mega-store-woocommerce' ),
		'section'  => 'mega_store_woocommerce_section_post',
		'default'  => [ 'option1', 'option2', 'option3', 'option4', 'option5' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Image', 'mega-store-woocommerce' ),
			'option2' => esc_html__( 'Post Meta', 'mega-store-woocommerce' ),
			'option3' => esc_html__( 'Post Title', 'mega-store-woocommerce' ),
			'option4' => esc_html__( 'Post Content', 'mega-store-woocommerce' ),
			'option5' => esc_html__( 'Post Categories', 'mega-store-woocommerce' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'mega_store_woocommerce_post_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'mega_store_woocommerce_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','mega-store-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','mega-store-woocommerce'),
            'Three Column' => __('Three Column','mega-store-woocommerce'),
            'Four Column' => __('Four Column','mega-store-woocommerce'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','mega-store-woocommerce'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','mega-store-woocommerce'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','mega-store-woocommerce')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','mega-store-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','mega-store-woocommerce'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','mega-store-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','mega-store-woocommerce'),
            'Three Column' => __('Three Column','mega-store-woocommerce'),
            'Four Column' => __('Four Column','mega-store-woocommerce'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','mega-store-woocommerce'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','mega-store-woocommerce'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','mega-store-woocommerce')
		],
	] );

	// Breadcrumb
	Kirki::add_section( 'mega_store_woocommerce_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'mega-store-woocommerce' ),
	    'panel'          => 'mega_store_woocommerce_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_bradcrumb',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_breadcrumb_heading',
		'section'     => 'mega_store_woocommerce_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'mega_store_woocommerce_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'mega-store-woocommerce' ),
        'section'  => 'mega_store_woocommerce_bradcrumb',
    ] );


	// HEADER SECTION

	Kirki::add_section( 'mega_store_woocommerce_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'mega-store-woocommerce' ),
	    'panel'          => 'mega_store_woocommerce_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_section_header',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_links_heading',
		'section'     => 'mega_store_woocommerce_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Top Header Text and URL', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Text 1', 'mega-store-woocommerce' ),
		'settings' => 'mega_store_woocommerce_free_delivery_text',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'URL 1', 'mega-store-woocommerce' ),
		'settings' => 'mega_store_woocommerce_free_delivery_link',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Text 2', 'mega-store-woocommerce' ),
		'settings' => 'mega_store_woocommerce_return_policy_text',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'URL 2', 'mega-store-woocommerce' ),
		'settings' => 'mega_store_woocommerce_return_policy_link',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_phone_number_heading',
		'section'     => 'mega_store_woocommerce_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'mega_store_woocommerce_phone_number',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_myaccount_link_heading',
		'section'     => 'mega_store_woocommerce_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'My Account URL', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'settings' => 'mega_store_woocommerce_myaccount_link',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_google_translation',
		'section'     => 'mega_store_woocommerce_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Google Translation Box', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_header_google_translation',
		'section'     => 'mega_store_woocommerce_section_header',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'Wishlist URL', 'mega-store-woocommerce' ),
		'settings' => 'mega_store_woocommerce_wislist_url',
		'section'  => 'mega_store_woocommerce_section_header',
		'default'  => '',
		'priority' => 10,
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_search',
		'section'     => 'mega_store_woocommerce_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_search_box_enable',
		'section'     => 'mega_store_woocommerce_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_socail_link',
		'section'     => 'mega_store_woocommerce_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'mega_store_woocommerce_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'mega-store-woocommerce' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'mega-store-woocommerce' ),
		'settings'     => 'mega_store_woocommerce_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'mega-store-woocommerce' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'mega-store-woocommerce' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'mega-store-woocommerce' ),
				'description' => esc_html__( 'Add the social icon url here.', 'mega-store-woocommerce' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'mega_store_woocommerce_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'mega-store-woocommerce' ),
        'panel'          => 'mega_store_woocommerce_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_blog_slide_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_heading',
		'section'     => 'mega_store_woocommerce_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_text_unable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_slider_heading',
		'section'     => 'mega_store_woocommerce_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'mega_store_woocommerce_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => 0,
		'choices'     => [
			'min'  => 0,
			'max'  => 5,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'mega_store_woocommerce_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'mega-store-woocommerce' ),
		'priority'    => 10,
		'choices'     => mega_store_woocommerce_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'mega_store_woocommerce_slide_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'mega_store_woocommerce_slider_heading_22',
	'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content Alignment', 'mega-store-woocommerce' ) . '</h3>',
	'priority'    => 10,
] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => 'CENTER-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'mega-store-woocommerce' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'mega-store-woocommerce' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'mega-store-woocommerce' ),

		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_slider_opacity_color',
		'label'       => esc_html__( 'Slider Opacity Option', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => '0.6',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'0' => esc_html__( '0', 'mega-store-woocommerce' ),
			'0.1' => esc_html__( '0.1', 'mega-store-woocommerce' ),
			'0.2' => esc_html__( '0.2', 'mega-store-woocommerce' ),
			'0.3' => esc_html__( '0.3', 'mega-store-woocommerce' ),
			'0.4' => esc_html__( '0.4', 'mega-store-woocommerce' ),
			'0.5' => esc_html__( '0.5', 'mega-store-woocommerce' ),
			'0.6' => esc_html__( '0.6', 'mega-store-woocommerce' ),
			'0.7' => esc_html__( '0.7', 'mega-store-woocommerce' ),
			'0.8' => esc_html__( '0.8', 'mega-store-woocommerce' ),
			'0.9' => esc_html__( '0.9', 'mega-store-woocommerce' ),
			'1.0' => esc_html__( '1.0', 'mega-store-woocommerce' ),
			

		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_overlay_option',
		'label'       => esc_html__( 'Enable / Disable Slider Overlay', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'mega_store_woocommerce_slider_image_overlay_color',
		'label'       => __( 'choose your Appropriate Overlay Color', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_blog_slide_section',
		'default'     => '',
	] );



	// PRODUCT CATEGORY SECTION

	Kirki::add_section( 'mega_store_woocommerce_product_category_section', array(
        'title'          => esc_html__( ' Product Category Settings', 'mega-store-woocommerce' ),
        'panel'          => 'mega_store_woocommerce_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_product_category_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_category_heading',
		'section'     => 'mega_store_woocommerce_product_category_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Product Category', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_product_category_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_product_category_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_product_category_heading_1',
		'section'     => 'mega_store_woocommerce_product_category_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Product Category Section ',  'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'mega_store_woocommerce_product_category_section_heading' ,
        'label'    => esc_html__( 'Heading',  'mega-store-woocommerce' ),
        'section'  => 'mega_store_woocommerce_product_category_section',
    ] );

    kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'mega_store_woocommerce_product_category_increament',
		'label'       => esc_html__( 'Number of product category to show ',  'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_product_category_section',
		'default'     => 0,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

    $mega_store_woocommerce_product_category = get_theme_mod('mega_store_woocommerce_product_category_increament','');
    for ( $j = 1; $j <= $mega_store_woocommerce_product_category; $j++ ) {

    	new \Kirki\Field\Image(
			[
				'settings'    => 'mega_store_woocommerce_product_category_box_images'.$j,
				'label'       => esc_html__( ' Category Image', 'mega-store-woocommerce' ),
				'section'     => 'mega_store_woocommerce_product_category_section',
				'default'     => '',
			]
		);

		Kirki::add_field( 'theme_config_id', [
	        'type'     => 'text',
	        'settings' => 'mega_store_woocommerce_product_category_box_title'.$j ,
	        'label'    => esc_html__( 'Category Text',  'mega-store-woocommerce' ),
	        'section'  => 'mega_store_woocommerce_product_category_section',
	    ] );

		Kirki::add_field( 'theme_config_id', [
	        'type'     => 'url',
	        'settings' => 'mega_store_woocommerce_product_category_box_title_url'.$j ,
	        'label'    => esc_html__( 'Category URL',  'mega-store-woocommerce' ),
	        'section'  => 'mega_store_woocommerce_product_category_section',
	    ] );

	}

	//OUR COLECTION SECTION

	Kirki::add_section( 'mega_store_woocommerce_our_collection_section', array(
	    'title'          => esc_html__( 'Our Collection Settings', 'mega-store-woocommerce' ),
	    'panel'          => 'mega_store_woocommerce_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_our_collection_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	    'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_heading',
		'section'     => 'mega_store_woocommerce_our_collection_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Collection',  'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_our_collection_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_our_collection_section',
		'default'     => true,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable',  'mega-store-woocommerce' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_our_collection_heading_1',
		'section'     => 'mega_store_woocommerce_our_collection_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Our Collection Section ',  'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 3,
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'mega_store_woocommerce_our_collection_sub_heading' ,
        'label'    => esc_html__( 'Sub Heading',  'mega-store-woocommerce' ),
        'section'  => 'mega_store_woocommerce_our_collection_section',

    ] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'mega_store_woocommerce_our_collection_heading' ,
        'label'    => esc_html__( 'Heading',  'mega-store-woocommerce' ),
        'section'  => 'mega_store_woocommerce_our_collection_section',
    ] );

    kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'mega_store_woocommerce_our_collection_tab_number',
		'label'       => esc_html__( 'Number of post to show ',  'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_our_collection_section',
		'default'     => 4,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'mega_store_woocommerce_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'mega-store-woocommerce' ),
        'panel'          => 'mega_store_woocommerce_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'mega-store-woocommerce' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'mega-store-woocommerce' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'mega_store_woocommerce_footer_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'mega-store-woocommerce' ) . '</div>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_footer_enable_heading',
		'section'     => 'mega_store_woocommerce_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'mega_store_woocommerce_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'mega-store-woocommerce' ),
			'off' => esc_html__( 'Disable', 'mega-store-woocommerce' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_footer_text_heading',
		'section'     => 'mega_store_woocommerce_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'mega_store_woocommerce_footer_text',
		'section'  => 'mega_store_woocommerce_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_footer_text_heading_2',
		'section'     => 'mega_store_woocommerce_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'mega_store_woocommerce_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'mega-store-woocommerce' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'mega-store-woocommerce' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'mega-store-woocommerce' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'mega-store-woocommerce' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'mega_store_woocommerce_footer_text_heading_1',
	'section'     => 'mega_store_woocommerce_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'mega-store-woocommerce' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'mega_store_woocommerce_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'mega-store-woocommerce' ),
		'section'     => 'mega_store_woocommerce_footer_section',
		'default'     => '',
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'mega_store_woocommerce_enable_footer_socail_link',
		'section'     => 'mega_store_woocommerce_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'mega-store-woocommerce' ) . '</h3>',
		'priority'    => 11,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'mega_store_woocommerce_footer_section',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icon', 'mega-store-woocommerce' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'mega-store-woocommerce' ),
		'settings'     => 'mega_store_woocommerce_footer_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'mega-store-woocommerce' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'mega-store-woocommerce' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'mega-store-woocommerce' ),
				'description' => esc_html__( 'Add the social icon url here.', 'mega-store-woocommerce' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

}

add_action( 'customize_register', 'mega_store_woocommerce_customizer_settings' );
function mega_store_woocommerce_customizer_settings( $wp_customize ) {
	$wp_customize->add_setting('mega_store_woocommerce_our_collection_tab_number',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('mega_store_woocommerce_our_collection_tab_number',array(
		'type' => 'number',
		'label' => __('Show number of product tab','mega-store-woocommerce'),
		'section' => 'mega_store_woocommerce_our_collection_section',
		'choices'     => [
			'min'  => 0,
			'max'  => 6,
			'step' => 1,
		],
	));

	$mega_store_woocommerce_collection_post = get_theme_mod('mega_store_woocommerce_our_collection_tab_number','');
    for ( $j = 1; $j <= $mega_store_woocommerce_collection_post; $j++ ) {

		$wp_customize->add_setting('mega_store_woocommerce_our_collection_tabs_text'.$j,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control('mega_store_woocommerce_our_collection_tabs_text'.$j,array(
			'type' => 'text',
			'label' => __('Tab Text ','mega-store-woocommerce').$j,
			'section' => 'mega_store_woocommerce_our_collection_section',
		));

		$mega_store_woocommerce_args = array(
	       'type'                     => 'product',
	        'child_of'                 => 0,
	        'parent'                   => '',
	        'orderby'                  => 'term_group',
	        'order'                    => 'ASC',
	        'hide_empty'               => false,
	        'hierarchical'             => 1,
	        'number'                   => '',
	        'taxonomy'                 => 'product_cat',
	        'pad_counts'               => false
	    );
		$categories = get_categories($mega_store_woocommerce_args);
		$cat_posts = array();
		$m = 0;
		$cat_posts[]='Select';
		foreach($categories as $category){
			if($m==0){
				$default = $category->slug;
				$m++;
			}
			$cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('mega_store_woocommerce_our_collection_category'.$j,array(
			'default'	=> '',
			'sanitize_callback' => 'mega_store_woocommerce_sanitize_select',
		));

		$wp_customize->add_control('mega_store_woocommerce_our_collection_category'.$j,array(
			'type'    => 'select',
			'choices' => $cat_posts,
			'label' => __('Select category to display products ','mega-store-woocommerce').$j,
			'section' => 'mega_store_woocommerce_our_collection_section',
		));
	}
}


/*
 *  Customizer Notifications
 */

$mega_store_woocommerce_config_customizer = array(
    'recommended_plugins' => array( 
        'kirki' => array(
            'recommended' => true,
            'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'If you want to show all the sections of the FrontPage, please install and activate %s plugin', 'mega-store-woocommerce' ), 
                '<strong>' . esc_html__( 'Kirki Customizer', 'mega-store-woocommerce' ) . '</strong>'
            ),
        ),
    ),
    'mega_store_woocommerce_recommended_actions'       => array(),
    'mega_store_woocommerce_recommended_actions_title' => esc_html__( 'Recommended Actions', 'mega-store-woocommerce' ),
    'mega_store_woocommerce_recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'mega-store-woocommerce' ),
    'mega_store_woocommerce_install_button_label'      => esc_html__( 'Install and Activate', 'mega-store-woocommerce' ),
    'mega_store_woocommerce_activate_button_label'     => esc_html__( 'Activate', 'mega-store-woocommerce' ),
    'mega_store_woocommerce_deactivate_button_label'   => esc_html__( 'Deactivate', 'mega-store-woocommerce' ),
);

Mega_Store_Woocommerce_Customizer_Notify::init( apply_filters( 'mega_store_woocommerce_customizer_notify_array', $mega_store_woocommerce_config_customizer ) );