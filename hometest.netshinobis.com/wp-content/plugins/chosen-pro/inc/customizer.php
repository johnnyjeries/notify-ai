<?php
defined( 'ABSPATH' ) OR exit;

add_action( 'customize_register', 'ct_chosen_pro_add_customizer_content', 11 );

function ct_chosen_pro_add_customizer_content( $wp_customize ) {

	// if Live Previewing another theme, don't do anything
	$chosen_section = $wp_customize->get_section('ct_chosen_logo_upload');

	if ( empty( $chosen_section ) ) {
		return;
	}

	/***** Reorder default sections *****/

	$wp_customize->get_section( 'title_tagline' )->priority = 9;

	// check if exists in case user has no pages
	if ( is_object( $wp_customize->get_section( 'static_front_page' ) ) ) {
		$wp_customize->get_section( 'static_front_page' )->priority = 10;
	}

	/********** Add Panels **********/

	// Add panel for colors
	if ( method_exists( 'WP_Customize_Manager', 'add_panel' ) ) {

		$wp_customize->add_panel( 'ct_chosen_pro_layout_panel', array(
			'priority'    => 1,
			'title'       => __( 'Layout', 'chosen-pro' )
		) );
		$wp_customize->add_panel( 'ct_chosen_pro_colors_panel', array(
			'priority'    => 2,
			'title'       => __( 'Colors', 'chosen-pro' ),
			'description' => __( 'Change any color on your site.', 'chosen-pro' )
		) );
		$wp_customize->add_panel( 'ct_chosen_pro_fonts_panel', array(
			'priority'    => 3,
			'title'       => __( 'Fonts', 'chosen-pro' ),
			'description' => __( 'Change any color on your site.', 'chosen-pro' )
		) );
		$wp_customize->add_panel( 'ct_chosen_pro_display_controls_panel', array(
			'priority'    => 6,
			'title'       => __( 'Display Controls', 'chosen-pro' ),
			'description' => __( 'Show/hide any element on your site.', 'chosen-pro' )
		) );
	}

	//----------------------------------------------------------------------------------
	// Header Image
	//----------------------------------------------------------------------------------

	// section
	$wp_customize->add_section( 'ct_chosen_pro_header_image', array(
		'title'    => __( 'Header Image', 'chosen-pro' ),
		'priority' => 4
	) );
	// setting - image or video
	$wp_customize->add_setting( 'header_image_type', array(
		'default'           => 'image',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_header_image_type'
	) );
	// control - image or video
	$wp_customize->add_control( 'header_image_type', array(
		'label'    => __( 'Display image or video?', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_header_image',
		'settings' => 'header_image_type',
		'type'     => 'radio',
		'choices'  => array(
			'image'  => __( 'Image', 'chosen-pro' ),
			'video'  => __( 'Video', 'chosen-pro' )
		)
	) );
	// setting - upload
	$wp_customize->add_setting( 'header_image_upload', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	// control - upload
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'header_image_upload', array(
			'label'    => __( 'Upload an image', 'chosen-pro' ),
			'section'  => 'ct_chosen_pro_header_image',
			'settings' => 'header_image_upload',
		)
	) );
		// setting - video
		$wp_customize->add_setting( 'header_image_video', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url'
		) );
		// control - video
		$wp_customize->add_control( 'header_image_video', array(
			'label'    => __( 'Enter a video URL', 'chosen-pro' ),
			'section'  => 'ct_chosen_pro_header_image',
			'settings' => 'header_image_video',
			'type'     => 'url'
		) );
	// setting - homepage only
	$wp_customize->add_setting( 'header_image_homepage', array(
		'default'           => 'no',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_yes_no_settings'
	) );
	// control - homepage only
	$wp_customize->add_control( 'header_image_homepage', array(
		'label'    => __( 'Only display on homepage?', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_header_image',
		'settings' => 'header_image_homepage',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'chosen-pro' ),
			'no'  => __( 'No', 'chosen-pro' )
		)
	) );
	// setting - link
	$wp_customize->add_setting( 'header_image_link', array(
		'sanitize_callback' => 'esc_url'
	) );
	// control - link
	$wp_customize->add_control( 'header_image_link', array(
		'label'    => __( 'Header image link', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_header_image',
		'settings' => 'header_image_link',
		'type'     => 'url'
	) );
	// setting - height type
	$wp_customize->add_setting( 'header_image_height_type', array(
		'default'           => 'responsive',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_header_image_height_type'
	) );
	// control - height type
	$wp_customize->add_control( 'header_image_height_type', array(
		'label'    => __( 'Responsive or Fixed height?', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_header_image',
		'settings' => 'header_image_height_type',
		'type'     => 'radio',
		'choices'  => array(
			'responsive' => __( 'Responsive', 'chosen-pro' ),
			'fixed'      => __( 'Fixed', 'chosen-pro' )
		)
	) );
	// setting - height
	$wp_customize->add_setting( 'header_image_height', array(
		'default'           => '20',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage'
	) );
	// control - height
	$wp_customize->add_control( 'header_image_height', array(
		'label'       => __( 'Adjust the height', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_header_image',
		'settings'    => 'header_image_height',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 100,
			'step' => 1
		)
	) );
	// setting - parallax
	$wp_customize->add_setting( 'header_image_parallax', array(
		'default'           => 'no',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_yes_no_settings'
	) );
	// control - parallax
	$wp_customize->add_control( 'header_image_parallax', array(
		'label'    => __( 'Add Parallax Effect?', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_header_image',
		'settings' => 'header_image_parallax',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'chosen-pro' ),
			'no'  => __( 'No', 'chosen-pro' )
		)
	) );

	//----------------------------------------------------------------------------------
	// Colors
	//----------------------------------------------------------------------------------

	$color_sections = ct_chosen_pro_custom_colors_data();

	// set priority (in case user is < 4.0, set below widgets)
	// panel is 42
	$priority = 120;

	// sections
	foreach ( $color_sections as $section ) {

		// add section
		$wp_customize->add_section( $section['section_id'], array(
			'priority'    => $priority,
			'title'       => $section['section_title'],
			'description' => $section['description'],
			'panel'       => 'ct_chosen_pro_colors_panel'
		) );

		$priority ++;

		/* Add Settings & Controls */

		$control_priority = 1;

		foreach ( $section as $setting ) {

			if ( is_array( $setting ) ) {

				$wp_customize->add_setting( $setting['setting_id'], array(
					'default'           => $setting['setting_default'],
					'sanitize_callback' => 'sanitize_hex_color'
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control(
					$wp_customize, $setting['setting_id'], array(
						'label'    => $setting['control_label'],
						'section'  => $section['section_id'],
						'settings' => $setting['setting_id'],
						'priority' => $control_priority
					)
				) );

				$control_priority ++;
			}
		}
	}

	//----------------------------------------------------------------------------------
	// Layout
	//----------------------------------------------------------------------------------

	/***** Blog *****/

	// section
	$wp_customize->add_section( 'ct_chosen_pro_layout', array(
		'title'    => __( 'Blog', 'chosen-pro' ),
		'description' => __( 'Change the layout for the blog.', 'chosen-pro' ),
		'panel'		 => 'ct_chosen_pro_layout_panel'
	) );
	// setting
	$wp_customize->add_setting( 'layout', array(
		'default'           => 'two-column',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_layout',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'layout', array(
		'type'        => 'radio',
		'label'       => __( 'Blog layout', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_layout',
		'setting'     => 'layout',
		'choices'     => array(
			'two-column'    => __( 'Two columns', 'chosen-pro' ),
			'one-column'    => __( 'One column', 'chosen-pro' ),
			'right-sidebar' => __( 'Right sidebar', 'chosen-pro' ),
			'left-sidebar'  => __( 'Left sidebar', 'chosen-pro' ),
			'two-right'     => __( 'Two columns - Right sidebar', 'chosen-pro' ),
			'two-left'      => __( 'Two columns - Left sidebar', 'chosen-pro' ),
			'three-column'  => __( 'Three columns', 'chosen-pro' )
		)
	) );

	/***** Posts *****/

	// section
	$wp_customize->add_section( 'ct_chosen_pro_layout_posts', array(
		'title'    => __( 'Posts', 'chosen-pro' ),
		'description' => __( 'Layout can be changed for individual posts in the post editor.', 'chosen-pro' ),
		'panel'		 => 'ct_chosen_pro_layout_panel'
	) );
	// setting
	$wp_customize->add_setting( 'layout_posts', array(
		'default'           => 'one-column',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_layout',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'layout_posts', array(
		'type'        => 'radio',
		'label'       => __( 'Post layout', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_layout_posts',
		'setting'     => 'layout_posts',
		'choices'     => array(
			'one-column'    => __( 'One column', 'chosen-pro' ),
			'right-sidebar' => __( 'Right sidebar', 'chosen-pro' ),
			'left-sidebar'  => __( 'Left sidebar', 'chosen-pro' )
		)
	) );

	/***** Pages *****/

	// section
	$wp_customize->add_section( 'ct_chosen_pro_layout_pages', array(
		'title'    => __( 'Pages', 'chosen-pro' ),
		'description' => __( 'Layout can be changed for individual pages in the post editor.', 'chosen-pro' ),
		'panel'		 => 'ct_chosen_pro_layout_panel'
	) );
	// setting
	$wp_customize->add_setting( 'layout_pages', array(
		'default'           => 'one-column',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_layout',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'layout_pages', array(
		'type'        => 'radio',
		'label'       => __( 'Page layout', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_layout_pages',
		'setting'     => 'layout_pages',
		'choices'     => array(
			'one-column'    => __( 'One column', 'chosen-pro' ),
			'right-sidebar' => __( 'Right sidebar', 'chosen-pro' ),
			'left-sidebar'  => __( 'Left sidebar', 'chosen-pro' )
		)
	) );

	/***** Archives *****/

	// section
	$wp_customize->add_section( 'ct_chosen_pro_layout_archives', array(
		'title'    => __( 'Archives', 'chosen-pro' ),
		'description' => __( 'Change the layout for category, tag, date, and author archives.', 'chosen-pro' ),
		'panel'		 => 'ct_chosen_pro_layout_panel'
	) );
	// setting
	$wp_customize->add_setting( 'layout_archives', array(
		'default'           => 'two-column',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_layout',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'layout_archives', array(
		'type'        => 'radio',
		'label'       => __( 'Archive layout', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_layout_archives',
		'setting'     => 'layout_archives',
		'choices'     => array(
			'two-column'    => __( 'Two columns', 'chosen-pro' ),
			'one-column'    => __( 'One column', 'chosen-pro' ),
			'right-sidebar' => __( 'Right sidebar', 'chosen-pro' ),
			'left-sidebar'  => __( 'Left sidebar', 'chosen-pro' ),
			'two-right'     => __( 'Two columns - Right sidebar', 'chosen-pro' ),
			'two-left'      => __( 'Two columns - Left sidebar', 'chosen-pro' ),
			'three-column'  => __( 'Three columns', 'chosen-pro' )
		)
	) );

	/***** Search Results *****/

	// section
	$wp_customize->add_section( 'ct_chosen_pro_layout_search', array(
		'title'    => __( 'Search Results', 'chosen-pro' ),
		'description' => __( 'Change the layout for the search results.', 'chosen-pro' ),
		'panel'		 => 'ct_chosen_pro_layout_panel'
	) );
	// setting
	$wp_customize->add_setting( 'layout_search', array(
		'default'           => 'two-column',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_layout',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'layout_search', array(
		'type'        => 'radio',
		'label'       => __( 'Search results layout', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_layout_search',
		'setting'     => 'layout_search',
		'choices'     => array(
			'two-column'    => __( 'Two columns', 'chosen-pro' ),
			'one-column'    => __( 'One column', 'chosen-pro' ),
			'right-sidebar' => __( 'Right sidebar', 'chosen-pro' ),
			'left-sidebar'  => __( 'Left sidebar', 'chosen-pro' ),
			'two-right'     => __( 'Two columns - Right sidebar', 'chosen-pro' ),
			'two-left'      => __( 'Two columns - Left sidebar', 'chosen-pro' ),
			'three-column'  => __( 'Three columns', 'chosen-pro' )
		)
	) );

	//----------------------------------------------------------------------------------
	// Custom Fonts
	//----------------------------------------------------------------------------------

	$fonts['default'] = 'Default';
	$font_data = ct_chosen_pro_prepare_fonts();
	foreach ( $font_data as $font => $weights ) {
		$fonts[ $font ] = $font;
	}

	$font_weights = array(
		'default' => __( 'Default', 'chosen-pro' ),
		'100' 		=> __( 'Thin', 'chosen-pro' ),
		'200' 		=> __( 'Extra-light', 'chosen-pro' ),
		'300' 		=> __( 'Light', 'chosen-pro' ),
		'400' 		=> __( 'Regular', 'chosen-pro' ),
		'500' 		=> __( 'Medium', 'chosen-pro' ),
		'600' 		=> __( 'Semi-Bold', 'chosen-pro' ),
		'700' 		=> __( 'Bold', 'chosen-pro' ),
		'800' 		=> __( 'Extra-Bold', 'chosen-pro' ),
		'900' 		=> __( 'Ultra-Bold', 'chosen-pro' )
	);

	// section
	$wp_customize->add_section( 'ct_chosen_pro_fonts', array(
		'title'       => __( 'Global', 'chosen-pro' ),
		'description' => sprintf( __( '<i>All fonts can be previewed at <a href="%s" target="_blank">Google Fonts</a></i>.', 'chosen-pro' ), 'https://fonts.google.com/' ),
		'panel'				=> 'ct_chosen_pro_fonts_panel'
	) );
	// setting - primary font family
	$wp_customize->add_setting( 'primary_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - primary font family
	$wp_customize->add_control( 'primary_font', array(
		'type'        => 'select',
		'label'       => __( 'Primary Font', 'chosen-pro' ),
		'description' => __( 'Changes font everywhere. Overridable with other font settings.', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts',
		'setting'     => 'primary_font',
		'choices'     => $fonts
	) );
	// setting - primary font weight
	$wp_customize->add_setting( 'primary_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - primary font weight
	$wp_customize->add_control( 'primary_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Primary (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts',
		'setting' => 'primary_font_weight',
		'choices' => $font_weights
	) );
	// setting - heading font family
	$wp_customize->add_setting( 'heading_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - heading font family
	$wp_customize->add_control( 'heading_font', array(
		'type'        => 'select',
		'label'       => __( 'Headings', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts',
		'setting'     => 'heading_font',
		'choices'     => $fonts
	) );
	// setting - heading font weight
	$wp_customize->add_setting( 'heading_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - heading font weight
	$wp_customize->add_control( 'heading_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Headings (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts',
		'setting' => 'heading_font_weight',
		'choices' => $font_weights
	) );
	// setting - input font family
	$wp_customize->add_setting( 'input_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - input font family
	$wp_customize->add_control( 'input_font', array(
		'type'        => 'select',
		'label'       => __( 'Buttons & Inputs', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts',
		'setting'     => 'input_font',
		'choices'     => $fonts
	) );
	// setting - input font weight
	$wp_customize->add_setting( 'input_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - input font weight
	$wp_customize->add_control( 'input_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Buttons & Inputs (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts',
		'setting' => 'input_font_weight',
		'choices' => $font_weights
	) );

	/***** Advanced Fonts *****/

	$wp_customize->add_section( 'ct_chosen_pro_fonts_advanced', array(
		'title'       => __( 'Individual Elements', 'chosen-pro' ),
		'description' => sprintf( __( '<i>All fonts can be previewed at <a href="%s" target="_blank">Google Fonts</a>.</i>', 'chosen-pro' ), 'https://fonts.google.com/' ),
		'panel'				=> 'ct_chosen_pro_fonts_panel'
	) );

	// setting - site title font family
	$wp_customize->add_setting( 'site_title_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - site title font family
	$wp_customize->add_control( 'site_title_font', array(
		'type'        => 'select',
		'label'       => __( 'Site Title', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'site_title_font',
		'choices'     => $fonts
	) );
	// setting - site title font weight
	$wp_customize->add_setting( 'site_title_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - site title font weight
	$wp_customize->add_control( 'site_title_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Site Title (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'site_title_font_weight',
		'choices' => $font_weights
	) );
	// setting - tagline font family
	$wp_customize->add_setting( 'tagline_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - tagline font family
	$wp_customize->add_control( 'tagline_font', array(
		'type'        => 'select',
		'label'       => __( 'Tagline', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'tagline_font',
		'choices'     => $fonts
	) );
	// setting - tagline font weight
	$wp_customize->add_setting( 'tagline_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - tagline font weight
	$wp_customize->add_control( 'tagline_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Tagline (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'tagline_font_weight',
		'choices' => $font_weights
	) );
	// setting - primary menu font family
	$wp_customize->add_setting( 'primary_menu_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - primary menu font family
	$wp_customize->add_control( 'primary_menu_font', array(
		'type'        => 'select',
		'label'       => __( 'Primary Menu', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'primary_menu_font',
		'choices'     => $fonts
	) );
	// setting - primary menu font weight
	$wp_customize->add_setting( 'primary_menu_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - primary menu font weight
	$wp_customize->add_control( 'primary_menu_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Primary Menu (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'primary_menu_font_weight',
		'choices' => $font_weights
	) );
	// setting - post title font family
	$wp_customize->add_setting( 'post_title_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - post title font family
	$wp_customize->add_control( 'post_title_font', array(
		'type'        => 'select',
		'label'       => __( 'Post & Page Titles', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'post_title_font',
		'choices'     => $fonts
	) );
	// setting - post title font weight
	$wp_customize->add_setting( 'post_title_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - post title font weight
	$wp_customize->add_control( 'post_title_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Post & Page Titles (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'post_title_font_weight',
		'choices' => $font_weights
	) );
	// setting - post content font family
	$wp_customize->add_setting( 'post_content_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - post content font family
	$wp_customize->add_control( 'post_content_font', array(
		'type'        => 'select',
		'label'       => __( 'Post & Page Content', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'post_content_font',
		'choices'     => $fonts
	) );
	// setting - post content font weight
	$wp_customize->add_setting( 'post_content_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - post content font weight
	$wp_customize->add_control( 'post_content_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Post & Page Content (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'post_content_font_weight',
		'choices' => $font_weights
	) );
	// setting - widget titles font family
	$wp_customize->add_setting( 'ct_widget_title_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - widget titles font family
	$wp_customize->add_control( 'ct_widget_title_font', array(
		'type'        => 'select',
		'label'       => __( 'Widget Titles', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'widget_title_font',
		'choices'     => $fonts
	) );
	// setting - widget titles font weight
	$wp_customize->add_setting( 'ct_widget_title_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - widget titles font weight
	$wp_customize->add_control( 'ct_widget_title_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Widget Titles (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'widget_title_font_weight',
		'choices' => $font_weights
	) );
	// setting - widget text font family
	$wp_customize->add_setting( 'ct_widget_text_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - widget text font family
	$wp_customize->add_control( 'ct_widget_text_font', array(
		'type'        => 'select',
		'label'       => __( 'Widget Text', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'ct_widget_text_font',
		'choices'     => $fonts
	) );
	// setting - widget text font weight
	$wp_customize->add_setting( 'ct_widget_text_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - widget text font weight
	$wp_customize->add_control( 'ct_widget_text_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Widget Text (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'ct_widget_text_font_weight',
		'choices' => $font_weights
	) );
	// setting - footer text font family
	$wp_customize->add_setting( 'footer_text_font', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_family'
	) );
	// control - footer text font family
	$wp_customize->add_control( 'footer_text_font', array(
		'type'        => 'select',
		'label'       => __( 'Footer Text', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_fonts_advanced',
		'setting'     => 'footer_text_font',
		'choices'     => $fonts
	) );
	// setting - footer text font weight
	$wp_customize->add_setting( 'footer_text_font_weight', array(
		'default'           => 'default',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_font_weight'
	) );
	// control - footer text font weight
	$wp_customize->add_control( 'footer_text_font_weight', array(
		'type'    => 'select',
		'label'   => __( 'Footer Text (Font weight)', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_fonts_advanced',
		'setting' => 'footer_text_font_weight',
		'choices' => $font_weights
	) );

	//----------------------------------------------------------------------------------
	// Spacing
	//----------------------------------------------------------------------------------

	if ( wp_get_theme() != 'Chosen Gamer' ) {
		// section
		$wp_customize->add_section( 'ct_chosen_pro_spacing', array(
			'title'       => __( 'Spacing', 'chosen-pro' ),
			'description' => __( 'Spacing may vary across screen sizes.', 'chosen-pro' ),
			'priority'    => 7
		) );
		// setting - above logo
		$wp_customize->add_setting( 'spacing_above_logo', array(
			'default'           => '72',
			'sanitize_callback' => 'absint'
		) );
		// control - above logo
		$wp_customize->add_control( 'spacing_above_logo', array(
			'type'    => 'number',
			'label'   => __( 'Above logo/site title (px)', 'chosen-pro' ),
			'section' => 'ct_chosen_pro_spacing',
			'setting' => 'spacing_above_logo'
		) );
		// setting - below logo
		$wp_customize->add_setting( 'spacing_below_logo', array(
			'default'           => '96',
			'sanitize_callback' => 'absint'
		) );
		// control - below logo
		$wp_customize->add_control( 'spacing_below_logo', array(
			'type'    => 'number',
			'label'   => __( 'Below logo/site title (px)', 'chosen-pro' ),
			'section' => 'ct_chosen_pro_spacing',
			'setting' => 'spacing_below_logo'
		) );
	}

	//----------------------------------------------------------------------------------
	// Featured Image Size
	//----------------------------------------------------------------------------------

	// section
	$wp_customize->add_section( 'ct_chosen_pro_featured_image_size', array(
		'title'    => __( 'Featured Image Size', 'chosen-pro' ),
		'priority' => 5
	) );
	// setting
	$wp_customize->add_setting( 'featured_image_size', array(
		'default'           => '2-1',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_featured_image_size'
	) );
	// control
	$wp_customize->add_control( 'featured_image_size', array(
		'label'       => __( 'Aspect ratio for all Featured Images', 'chosen-pro' ),
		'description' => __( 'Size can be overridden in Post editor.', 'chosen-pro' ),
		'section'     => 'ct_chosen_pro_featured_image_size',
		'settings'    => 'featured_image_size',
		'type'        => 'select',
		'choices'     => array(
			'2-1'     => '2:1',
			'1-2'     => '1:2',
			'16-9'    => '16:9',
			'9-16'    => '9:16',
			'3-2'     => '3:2',
			'2-3'     => '2:3',
			'4-3'     => '4:3',
			'3-4'     => '3:4',
			'5-4'     => '5:4',
			'4-5'     => '4:5',
			'1-1'     => '1:1',
			'natural' => __( 'Natural Dimensions', 'chosen-pro' )
		)
	) );

	//----------------------------------------------------------------------------------
	// Display Controls
	//----------------------------------------------------------------------------------

	/***** Header *****/

	$wp_customize->add_section( 'ct_chosen_pro_display_header', array(
		'title'       => __( 'Header', 'chosen-pro' ),
		'panel'				=> 'ct_chosen_pro_display_controls_panel'
	) );
	// setting - site title
	$wp_customize->add_setting( 'display_site_title', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - site title
	$wp_customize->add_control( 'display_site_title', array(
		'type'    => 'radio',
		'label'   => __( 'Site title', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_header',
		'setting' => 'display_site_title',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - tagline
	$wp_customize->add_setting( 'display_tagline', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - tagline
	$wp_customize->add_control( 'display_tagline', array(
		'type'    => 'radio',
		'label'   => __( 'Tagline', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_header',
		'setting' => 'display_tagline',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - primary menu
	$wp_customize->add_setting( 'display_primary_menu', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - primary menu
	$wp_customize->add_control( 'display_primary_menu', array(
		'type'    => 'radio',
		'label'   => __( 'Primary Menu', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_header',
		'setting' => 'display_primary_menu',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );

	/***** Posts *****/

	$wp_customize->add_section( 'ct_chosen_pro_display_posts', array(
		'title'       => __( 'Posts', 'chosen-pro' ),
		'panel'				=> 'ct_chosen_pro_display_controls_panel'
	) );
	// setting - post title
	$wp_customize->add_setting( 'display_post_title', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - post title
	$wp_customize->add_control( 'display_post_title', array(
		'type'    => 'radio',
		'label'   => __( 'Post titles', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_posts',
		'setting' => 'display_post_title',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - post meta
	$wp_customize->add_setting( 'display_post_date', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - post meta
	$wp_customize->add_control( 'display_post_date', array(
		'type'    => 'radio',
		'label'   => __( 'Post date', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_posts',
		'setting' => 'display_post_meta',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - more link
	$wp_customize->add_setting( 'display_more_link', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - more link
	$wp_customize->add_control( 'display_more_link', array(
		'type'    => 'radio',
		'label'   => __( '"Continue reading" button', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_posts',
		'setting' => 'display_more_link',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - comments link
	if ( wp_get_theme() != 'Chosen Gamer' ) {
		$wp_customize->add_setting( 'display_comments_link', array(
			'default'           => 'show',
			'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
			'transport'         => 'postMessage'
		) );
		// control - comments link
		$wp_customize->add_control( 'display_comments_link', array(
			'type'    => 'radio',
			'label'   => __( 'Comments link', 'chosen-pro' ),
			'section' => 'ct_chosen_pro_display_posts',
			'setting' => 'display_comments_link',
			'choices' => array(
				'show' => __( 'Show', 'chosen-pro' ),
				'hide' => __( 'Hide', 'chosen-pro' )
			)
		) );
	}
	// setting - post categories
	$wp_customize->add_setting( 'display_post_categories', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - post categories
	$wp_customize->add_control( 'display_post_categories', array(
		'type'    => 'radio',
		'label'   => __( 'Post categories', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_posts',
		'setting' => 'display_post_categories',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - post tags
	$wp_customize->add_setting( 'display_post_tags', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - post tags
	$wp_customize->add_control( 'display_post_tags', array(
		'type'    => 'radio',
		'label'   => __( 'Post tags', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_posts',
		'setting' => 'display_post_tags',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - post nav
	$wp_customize->add_setting( 'display_post_nav', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - post nav
	$wp_customize->add_control( 'display_post_nav', array(
		'type'    => 'radio',
		'label'   => __( 'Previous/Next post links', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_posts',
		'setting' => 'display_post_nav',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );

	/***** Commments *****/

	$wp_customize->add_section( 'ct_chosen_pro_display_comments', array(
		'title'       => __( 'Comments', 'chosen-pro' ),
		'panel'				=> 'ct_chosen_pro_display_controls_panel'
	) );
	// setting - comment count
	$wp_customize->add_setting( 'display_comment_count', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - comment count
	$wp_customize->add_control( 'display_comment_count', array(
		'type'    => 'radio',
		'label'   => __( 'Comment count', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_comments',
		'setting' => 'display_comment_count',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );
	// setting - comment date
	$wp_customize->add_setting( 'display_comment_date', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - comment date
	$wp_customize->add_control( 'display_comment_date', array(
		'type'    => 'radio',
		'label'   => __( 'Comment date', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_comments',
		'setting' => 'display_comment_date',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );

	/***** Archives *****/

	$wp_customize->add_section( 'ct_chosen_pro_display_archives', array(
		'title'       => __( 'Archives', 'chosen-pro' ),
		'description' => __( 'These settings apply to the category, tag, date, and author archives.', 'chosen-pro' ),
		'panel'				=> 'ct_chosen_pro_display_controls_panel'
	) );
	// setting - archive title
	$wp_customize->add_setting( 'display_archive_title', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - archive title
	$wp_customize->add_control( 'display_archive_title', array(
		'type'    => 'radio',
		'label'   => __( 'Archive title', 'chosen-pro' ),
		'description' => __( 'Ex: "Category: Design"', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_archives',
		'setting' => 'display_archive_title',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );

	/***** Footer *****/

	$wp_customize->add_section( 'ct_chosen_pro_display_footer', array(
		'title'       => __( 'Footer', 'chosen-pro' ),
		'panel'				=> 'ct_chosen_pro_display_controls_panel'
	) );
	// setting - footer
	$wp_customize->add_setting( 'display_footer', array(
		'default'           => 'show',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_show_hide',
		'transport'         => 'postMessage'
	) );
	// control - footer
	$wp_customize->add_control( 'display_footer', array(
		'type'    => 'radio',
		'label'   => __( 'Footer', 'chosen-pro' ),
		'section' => 'ct_chosen_pro_display_footer',
		'setting' => 'display_footer',
		'choices' => array(
			'show' => __( 'Show', 'chosen-pro' ),
			'hide' => __( 'Hide', 'chosen-pro' )
		)
	) );

	//----------------------------------------------------------------------------------
	// Fixed Menu
	//----------------------------------------------------------------------------------

	// section
	$wp_customize->add_section( 'ct_chosen_pro_fixed_menu', array(
		'title'    => __( 'Fixed Menu', 'chosen-pro' ),
		'priority' => 7
	) );
	// setting
	$wp_customize->add_setting( 'fixed_menu', array(
		'default'           => 'no',
		'sanitize_callback' => 'ct_chosen_pro_sanitize_yes_no_settings'
	) );
	// control
	$wp_customize->add_control( 'fixed_menu', array(
		'label'    => __( 'Fix the menu to the top of the screen?', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_fixed_menu',
		'settings' => 'fixed_menu',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'chosen-pro' ),
			'no'  => __( 'No', 'chosen-pro' )
		)
	) );

	//----------------------------------------------------------------------------------
	// Footer Text
	//----------------------------------------------------------------------------------

	// section
	$wp_customize->add_section( 'ct_chosen_pro_footer_text', array(
		'title'    => __( 'Footer Text', 'chosen-pro' ),
		'priority' => 8
	) );
	// setting
	$wp_customize->add_setting( 'footer_text', array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'footer_text', array(
		'label'    => __( 'Edit the text in your footer', 'chosen-pro' ),
		'section'  => 'ct_chosen_pro_footer_text',
		'settings' => 'footer_text',
		'type'     => 'textarea'
	) );
}

// sanitize yes/no settings
function ct_chosen_pro_sanitize_yes_no_settings( $input ) {

	$valid = array(
		'yes' => __( 'Yes', 'chosen-pro' ),
		'no'  => __( 'No', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_sanitize_header_image_height_type( $input ) {

	$valid = array(
		'responsive' => __( 'Responsive', 'chosen-pro' ),
		'fixed'      => __( 'Fixed', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_sanitize_font_family( $input ) {

	$fonts['default'] = 'Default';
	$font_data = ct_chosen_pro_prepare_fonts();
	foreach ( $font_data as $font => $weights ) {
		$fonts[ $font ] = $font;
	}

	return array_key_exists( $input, $fonts ) ? $input : '';
}

function ct_chosen_pro_sanitize_font_weight( $input ) {

	$valid = array(
		'default' => __( 'Default', 'chosen-pro' ),
		'100' 		=> __( 'Thin', 'chosen-pro' ),
		'200' 		=> __( 'Extra-light', 'chosen-pro' ),
		'300' 		=> __( 'Light', 'chosen-pro' ),
		'400' 		=> __( 'Regular', 'chosen-pro' ),
		'500' 		=> __( 'Medium', 'chosen-pro' ),
		'600' 		=> __( 'Semi-Bold', 'chosen-pro' ),
		'700' 		=> __( 'Bold', 'chosen-pro' ),
		'800' 		=> __( 'Extra-Bold', 'chosen-pro' ),
		'900' 		=> __( 'Ultra-Bold', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function ct_chosen_pro_sanitize_layout( $input ) {

	$valid = array(
		'two-column'    => __( 'Two columns', 'chosen-pro' ),
		'one-column'    => __( 'One column', 'chosen-pro' ),
		'right-sidebar' => __( 'Right sidebar', 'chosen-pro' ),
		'left-sidebar'  => __( 'Left sidebar', 'chosen-pro' ),
		'two-right'     => __( 'Two columns - Right sidebar', 'chosen-pro' ),
		'two-left'      => __( 'Two columns - Left sidebar', 'chosen-pro' ),
		'three-column'  => __( 'Three columns', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_sanitize_show_hide( $input ) {

	$valid = array(
		'show' => __( 'Show', 'chosen-pro' ),
		'hide' => __( 'Hide', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_sanitize_featured_image_size( $input ) {

	$valid = array(
		'2-1'     => '2:1',
		'1-2'     => '1:2',
		'16-9'    => '16:9',
		'9-16'    => '9:16',
		'3-2'     => '3:2',
		'2-3'     => '2:3',
		'4-3'     => '4:3',
		'3-4'     => '3:4',
		'5-4'     => '5:4',
		'4-5'     => '4:5',
		'1-1'     => '1:1',
		'natural' => __( 'Natural Dimensions', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_sanitize_header_image_type( $input ) {

	$valid = array(
		'image'  => __( 'Image', 'chosen-pro' ),
		'video'  => __( 'Video', 'chosen-pro' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function ct_chosen_pro_remove_customizer_ad( $content ) {
	return '';
}
add_filter( 'ct_chosen_customizer_ad', 'ct_chosen_pro_remove_customizer_ad' );