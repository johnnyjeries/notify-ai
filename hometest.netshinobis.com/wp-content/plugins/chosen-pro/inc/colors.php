<?php
defined( 'ABSPATH' ) OR exit;

function ct_chosen_pro_custom_colors_data() {

	$color_sections = array(

		/***** Base *****/

		array(
			'section_id'    => 'ct_chosen_pro_colors_base',
			'section_title' => esc_html__( 'Base', 'chosen-pro' ),
			'description'   => esc_html__( 'These colors affect elements across the entire site.', 'chosen-pro' ),
			array(
				'setting_id'      => 'colors_base_background',
				'setting_default' => '#fff',
				'control_label'   => esc_html__( 'Background', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_headings',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Headings', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_links',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Links', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_links_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Links (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_content',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Content', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_inputs',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Inputs', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_inputs_bg',
				'setting_default' => '#ededed',
				'control_label'   => esc_html__( 'Inputs Background', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_inputs_bg_focus',
				'setting_default' => '#ffffff',
				'control_label'   => esc_html__( 'Inputs Background (focus)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_inputs_border',
				'setting_default' => '#dedede',
				'control_label'   => esc_html__( 'Inputs Border', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_buttons',
				'setting_default' => '#ffffff',
				'control_label'   => esc_html__( 'Buttons', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_buttons_hover',
				'setting_default' => '#ffffff',
				'control_label'   => esc_html__( 'Buttons (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_buttons_bg',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Buttons Background', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_base_buttons_bg_hover',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Buttons Background (hover)', 'chosen-pro' )
			)
		),
		/***** Header *****/

		array(
			'section_id'    => 'ct_chosen_pro_colors_header',
			'section_title' => esc_html__( 'Header', 'chosen-pro' ),
			'description'   => esc_html__( 'These colors affect elements in the Header.', 'chosen-pro' ),
			array(
				'setting_id'      => 'colors_header_menu_links',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Menu Links', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_menu_links_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Menu Links (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_menu_links_border',
				'setting_default' => '#3a3a3a',
				'control_label'   => esc_html__( 'Menu Links Border', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_mobile_menu_button',
				'setting_default' => '#767676',
				'control_label'   => esc_html__( 'Mobile Menu Button', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_social_icons',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Social Icons', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_social_icons_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Social Icons (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_site_title',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Site Title', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_site_title_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Site Title (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_header_tagline',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Tagline', 'chosen-pro' )
			)
		),
		/***** Post *****/

		array(
			'section_id'    => 'ct_chosen_pro_colors_post',
			'section_title' => esc_html__( 'Posts', 'chosen-pro' ),
			'description'   => esc_html__( 'These colors affect elements in Posts on the Blog and Post pages.', 'chosen-pro' ),
			array(
				'setting_id'      => 'colors_post_title',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Title', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_title_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Title (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_date',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Date', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_content',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Content', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_links',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Links', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_links_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Links (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_more_button',
				'setting_default' => '#ffffff',
				'control_label'   => esc_html__( 'More Button', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_more_button_hover',
				'setting_default' => '#ffffff',
				'control_label'   => esc_html__( 'More Button (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_more_button_bg',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'More Button Background', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_more_button_bg_hover',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'More Button Background (hover)', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_comments_link',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Comments Link', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_post_comments_link_hover',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Comments Link (hover)', 'chosen-pro' )
			)
		),
		/***** Comments *****/

		array(
			'section_id'    => 'ct_chosen_pro_colors_comments',
			'section_title' => esc_html__( 'Comments', 'chosen-pro' ),
			'description'   => esc_html__( 'These colors affect elements in the Comments.', 'chosen-pro' ),
			array(
				'setting_id'      => 'colors_comments_content',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Content', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_comments_links',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Links', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_comments_links_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Links (hover)', 'chosen-pro' )
			)
		),
		/***** Widgets *****/

		array(
			'section_id'    => 'ct_chosen_pro_colors_widgets',
			'section_title' => esc_html__( 'Widgets', 'chosen-pro' ),
			'description'   => esc_html__( 'These colors affect elements in Widgets.', 'chosen-pro' ),
			array(
				'setting_id'      => 'colors_widgets_headings',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Headings', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_widgets_content',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Content', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_widgets_links',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Links', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_widgets_links_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Links (hover)', 'chosen-pro' )
			)
		),
		/***** Footer *****/

		array(
			'section_id'    => 'ct_chosen_pro_colors_footer',
			'section_title' => esc_html__( 'Footer', 'chosen-pro' ),
			'description'   => esc_html__( 'These colors affect elements in the Footer.', 'chosen-pro' ),
			array(
				'setting_id'      => 'colors_footer_bg',
				'setting_default' => '#f5f5f5',
				'control_label'   => esc_html__( 'Background', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_footer_border',
				'setting_default' => '#ededed',
				'control_label'   => esc_html__( 'Border', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_footer_content',
				'setting_default' => '#545454',
				'control_label'   => esc_html__( 'Content', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_footer_links',
				'setting_default' => '#2b2b2b',
				'control_label'   => esc_html__( 'Links', 'chosen-pro' )
			),
			array(
				'setting_id'      => 'colors_footer_links_hover',
				'setting_default' => '#666666',
				'control_label'   => esc_html__( 'Links (hover)', 'chosen-pro' )
			)
		)
	);

	return apply_filters( 'ct_chosen_pro_filter_color_data', $color_sections );
}

// filter the custom color data, so it can be updated based on the child theme active
function ct_chosen_pro_filter_custom_colors_css( $color_sections ) {

	// if Chosen Gamer child theme is active
	if ( wp_get_theme() == 'Chosen Gamer' ) {

		// for each section
		foreach ( $color_sections as $key1 => &$section ) {

			/* Add Settings */

			// add new settings to Header section
			if ( $section['section_id'] == 'ct_chosen_pro_colors_header' ) {

				// setting for current menu item underline
				$menu_link_underline = array(
					'setting_id'      => 'colors_header_menu_links_underline',
					'setting_default' => '#15d9aff',
					'control_label'   => esc_html__( 'Current Menu Item Underline', 'chosen-pro' )
				);

				// add to current section array
				$color_sections[ $key1 ][] = $menu_link_underline;
			} // add new settings to archives section
			elseif ( $section['section_id'] == 'ct_chosen_pro_colors_post' ) {

				// pagination link bg :hover
				$post_category_links = array(
					'setting_id'      => 'colors_post_categories',
					'setting_default' => '#15d9af',
					'control_label'   => esc_html__( 'Post category links', 'chosen-pro' )
				);

				// add new settings to end of section array
				$color_sections[ $key1 ][] = $post_category_links;
				array_splice( $color_sections[ $key1 ], 3, 0, array( $post_category_links ) );
			} 
			
			/* Change Existing Color Default values */

			// for each setting
			foreach ( $section as $key2 => &$setting ) {

				// error checking
				if ( is_array( $setting ) ) {

					// main text
					if ( $setting['setting_id'] == 'colors_base_content' ) {
						$setting['setting_default'] = '#2b2b2b';
					}
					// menu links hover
					if ( $setting['setting_id'] == 'colors_header_menu_links_hover' ) {
						$setting['setting_default'] = '#15d9af';
					}
					// post date
					if ( $setting['setting_id'] == 'colors_post_date' ) {
						$setting['setting_default'] = '#666666';
					}
					// post text
					if ( $setting['setting_id'] == 'colors_post_content' ) {
						$setting['setting_default'] = '#2b2b2b';
					}
					// post links hover
					if ( $setting['setting_id'] == 'colors_post_links_hover' ) {
						$setting['setting_default'] = '#15d9af';
					}
					// more button background hover
					if ( $setting['setting_id'] == 'colors_post_more_button_bg_hover' ) {
						$setting['setting_default'] = '#15d9af';
					}
					// comments link
					if ( $setting['setting_id'] == 'colors_post_comments_link' ) {
						$setting['setting_default'] = '#15d9af';
					}
					// comments link hover
					if ( $setting['setting_id'] == 'colors_post_comments_link_hover' ) {
						$setting['setting_default'] = '#15d9af';
					}
					// comment text
					if ( $setting['setting_id'] == 'colors_comments_content' ) {
						$setting['setting_default'] = '#2b2b2b';
					}
					// comments link hover
					if ( $setting['setting_id'] == 'colors_comments_links_hover' ) {
						$setting['setting_default'] = '#15d9af';
					}
					// widgets text
					if ( $setting['setting_id'] == 'colors_widgets_content' ) {
						$setting['setting_default'] = '#2b2b2b';
					}
					// widgets links hover
					if ( $setting['setting_id'] == 'colors_widgets_links_hover' ) {
						$setting['setting_default'] = '#15d9af';
					}

					/* Remove Settings */

					// menu item border
					elseif ( $setting['setting_id'] == 'colors_header_menu_links_border' ) {
						unset( $color_sections[ $key1 ][ $key2 ] );
					}
				}
			}
		}
	}

	return $color_sections;
}
add_filter( 'ct_chosen_pro_filter_color_data', 'ct_chosen_pro_filter_custom_colors_css' );

// output the css
function ct_chosen_pro_custom_colors_css() {

	// get the data
	$color_sections = ct_chosen_pro_custom_colors_data();

	// set array
	$custom_css = '';

	// for each section
	foreach ( $color_sections as $section ) {

		// for each setting
		foreach ( $section as $setting ) {

			// error checking
			if ( is_array( $setting ) ) {

				// get the color value
				$value = get_theme_mod( $setting['setting_id'] );

				// if not empty and not equal to default value
				if ( $value && $value !== $setting['setting_default'] ) {
					// output the css

					/***** Base *****/

					if ( $setting['setting_id'] == 'colors_base_background' ) {
						$custom_css .= "body, #overflow-container {background: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_headings' ) {
						$custom_css .= "h1, h2, h3, h4, h5, h6 {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_links' ) {
						$custom_css .= "a, a:link, a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_links_hover' ) {
						$custom_css .= "a:hover, a:active, a:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_content' ) {
						$custom_css .= "body {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_inputs' ) {
						$custom_css .= "input:not([type='submit']),
						                textarea {color: $value !important;}";
					} elseif ( $setting['setting_id'] == 'colors_base_inputs_bg' ) {
						$custom_css .= "input:not([type='submit']),
						                textarea {background: $value !important;}";
					} elseif ( $setting['setting_id'] == 'colors_base_inputs_bg_focus' ) {
						$custom_css .= "input:not([type='submit']):focus,
						                textarea:focus {background: $value !important;}";
					} elseif ( $setting['setting_id'] == 'colors_base_inputs_border' ) {
						$custom_css .= "input:not([type='submit']),
						                textarea {border-color: $value !important;}";
					} elseif ( $setting['setting_id'] == 'colors_base_buttons' ) {
						$custom_css .= "input[type='submit'] {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_buttons_hover' ) {
						$custom_css .= "input[type='submit']:hover,
						                input[type='submit']:active,
						                input[type='submit']:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_buttons_bg' ) {
						$custom_css .= "input[type='submit'] {background: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_base_buttons_bg_hover' ) {
						$custom_css .= "input[type='submit']:hover,
						                input[type='submit']:active,
						                input[type='submit']:focus {background: $value;}";
					} /***** Header *****/

					elseif ( $setting['setting_id'] == 'colors_header_menu_links' ) {
						$custom_css .= ".menu-primary a,
										.menu-primary a:link,
										.menu-primary a:visited,
										.toggle-dropdown {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_menu_links_hover' ) {
						$custom_css .= ".menu-primary a:hover,
										.menu-primary a:active,
										.menu-primary a:focus,
										.menu-primary a:hover ~ button,
										.menu-primary a:active ~ button,
										.menu-primary a:focus ~ button {color: $value !important;}";
					} elseif ( $setting['setting_id'] == 'colors_header_menu_links_border' ) {
						$custom_css .= ".menu-primary .current-menu-item > a,
										.menu-primary .current_page_item > a {outline-color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_mobile_menu_button' ) {
						$custom_css .= "#toggle-navigation svg g {fill: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_social_icons' ) {
						$custom_css .= ".social-media-icons a,
						                .social-media-icons a:link,
						                .social-media-icons a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_social_icons_hover' ) {
						$custom_css .= ".social-media-icons a:hover,
						                .social-media-icons a:active,
						                .social-media-icons a:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_site_title' ) {
						$custom_css .= ".site-title a,
						                .site-title a:link,
						                .site-title a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_site_title_hover' ) {
						$custom_css .= ".site-title a:hover,
						                .site-title a:active,
						                .site-title a:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_tagline' ) {
						$custom_css .= ".tagline {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_header_menu_links_underline' ) {
						$custom_css .= ".menu-primary .menu-primary-items .current-menu-item > a {border-color: $value;}";
					} 
					/***** Post *****/
					elseif ( $setting['setting_id'] == 'colors_post_title' ) {
						$custom_css .= ".entry .post-title,
						                .entry .post-title a,
						                .entry .post-title a:link,
						                .entry .post-title a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_title_hover' ) {
						$custom_css .= ".entry .post-title a:hover,
						                .entry .post-title a:active,
						                .entry .post-title a:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_date' ) {
						$custom_css .= ".post-date,
														.entry .post-content .date {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_content' ) {
						$custom_css .= ".entry > article {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_links' ) {
						$custom_css .= ".blog .post-content :not(.comments-link) :not(.more-link) a,
						                .archive .post-content :not(.comments-link) :not(.more-link) a:link,
						                .search .post-content :not(.comments-link) :not(.more-link) a:visited,
						                .singular .post-content a,
						                .singular .post-content a:link,
						                .singular .post-content a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_links_hover' ) {
						$custom_css .= ".singular .post-content a:hover,
														.singular .post-content a:active,
														.singular .post-content a:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_more_button' ) {
						$custom_css .= ".entry .more-link,
						                .entry .more-link:link,
						                .entry .more-link:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_more_button_hover' ) {
						$custom_css .= ".entry .more-link:hover,
						                .entry .more-link:active,
						                .entry .more-link:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_more_button_bg' ) {
						$custom_css .= ".entry .more-link,
						                .entry .more-link:link,
						                .entry .more-link:visited {background: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_more_button_bg_hover' ) {
						$custom_css .= ".entry .post-content .more-link:hover,
														.entry .post-content .more-link:active,
														.entry .post-content .more-link:focus {background: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_comments_link' ) {
						$custom_css .= ".comments-link,
										.entry .comments-link a,
						                .entry .comments-link a:link,
						                .entry .comments-link a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_comments_link_hover' ) {
						$custom_css .= ".entry .comments-link:hover,
										.entry .comments-link a:hover,
						                .entry .comments-link a:active,
						                .entry .comments-link a:focus {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_post_categories' ) {
						$custom_css .= ".post-header .categories span a,
														.post-header .categories span a:link,
														.post-header .categories span a:visited {color: $value;}";
					}
					/***** Comments *****/
					elseif ( $setting['setting_id'] == 'colors_comments_content' ) {
						$custom_css .= "li.comment,
						                li.pingback {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_comments_links' ) {
						$custom_css .= "li.comment a,
						                li.comment a:link,
						                li.comment a:visited,
					                    li.pingback a,
				                        li.pingback a:link,
			                            li.pingback a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_comments_links_hover' ) {
						$custom_css .= "li.comment a:hover,
						                li.comment a:active,
						                li.comment a:focus,
					                    li.pingback a:hover,
				                        li.pingback a:active,
			                            li.pingback a:focus  {color: $value;}";
					} /***** Widgets *****/

					elseif ( $setting['setting_id'] == 'colors_widgets_headings' ) {
						$custom_css .= ".widget h1,
										.widget h2,
										.widget h3,
										.widget h4,
										.widget h5,
										.widget h6 {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_widgets_content' ) {
						$custom_css .= ".widget {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_widgets_links' ) {
						$custom_css .= ".widget a,
						                .widget a:link,
						                .widget a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_widgets_links_hover' ) {
						$custom_css .= ".sidebar .widget a:hover,
														.sidebar .widget a:active,
														.sidebar .widget a:focus {color: $value !important;}";
					} /***** Footer *****/

					elseif ( $setting['setting_id'] == 'colors_footer_bg' ) {
						$custom_css .= ".site-footer {background: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_footer_border' ) {
						$custom_css .= ".site-footer {border-color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_footer_content' ) {
						$custom_css .= ".site-footer .design-credit {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_footer_links' ) {
						$custom_css .= ".site-footer .design-credit a,
						                .site-footer .design-credit a:link,
						                .site-footer .design-credit a:visited {color: $value;}";
					} elseif ( $setting['setting_id'] == 'colors_footer_links_hover' ) {
						$custom_css .= ".site-footer .design-credit a:hover,
										.site-footer .design-credit a:active,
										.site-footer .design-credit a:focus {color: $value;}";
					}
				}
			}
		}
	}

	$custom_css = ct_chosen_pro_sanitize_css( $custom_css );

	wp_add_inline_style( 'ct-chosen-style-rtl', $custom_css );
	wp_add_inline_style( 'ct-chosen-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ct_chosen_pro_custom_colors_css', 99 );