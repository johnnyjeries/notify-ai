<?php
/*
Plugin Name: Chosen Pro
Version: 1.24
Plugin URI: https://www.competethemes.com/chosen-pro/
Description: Chosen Pro adds premium functionality and flexibility to the Chosen WordPress theme.
Author: Compete Themes
Author URI: https://www.competethemes.com
Text Domain: chosen-pro
Domain Path: /languages
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Chosen Pro WordPress Plugin, Copyright 2019 Compete Themes
Chosen Pro is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined( 'ABSPATH' ) OR exit;

// Chosen not active
if ( get_template() != 'chosen' ) {

	$chosen = wp_get_theme( 'chosen' );

	// if installed, but not active
	if ( $chosen->exists() ) {

		// tell them to activate Chosen
		function ct_chosen_pro_needs_chosen() { ?>
			<div class="update-nag">
				<p>
					<?php
					$link = admin_url( 'themes.php' );
					printf( __( 'Almost done! Please <a id="switch-themes-link" href="%s">click here</a> to activate the Chosen theme and use the Chosen Pro plugin.', 'chosen-pro' ), esc_url( $link ) );
					?>
				</p>
			</div>
		<?php }
		add_action( 'admin_notices', 'ct_chosen_pro_needs_chosen' );

		// switch to Chosen theme, and send them to the Appearance menu
		function ct_chosen_pro_switch_themes() {
			switch_theme( 'chosen', 'chosen' );
			echo admin_url( 'themes.php' );
			wp_die();
		}
		add_action( 'wp_ajax_ct_switch_themes', 'ct_chosen_pro_switch_themes' );

		// trigger theme switch on link click and send to Appearance menu
		function ct_chosen_pro_switch_themes_js() { ?>
			<script type="text/javascript">
				jQuery(document).ready(function ($) {

					var data = {
						'action': 'ct_switch_themes'
					};

					$('#switch-themes-link').on('click', function(e) {
						e.preventDefault();
						jQuery.post(ajaxurl, data, function (response) {
							window.location.href = response;
						});
					});
				});
			</script> <?php
		}
		add_action( 'admin_footer', 'ct_chosen_pro_switch_themes_js' );
	}
	// Chosen not installed
	else {

		// tell them to install Chosen
		function ct_chosen_pro_install_chosen() { ?>
			<div class="update-nag">
				<p>
					<?php
					$link_chosen_search = add_query_arg(
						'search', 'chosen', admin_url( 'theme-install.php' )
					);
					printf( __( "Chosen Pro needs the Chosen theme to work. Please <a href='%s'>click here</a> to find and install Chosen from the Appearance menu.", "chosen-pro" ), esc_url( $link_chosen_search ) )
					?>
				</p>
			</div>
		<?php }
		add_action( 'admin_notices', 'ct_chosen_pro_install_chosen' );
	}
} else {

	// set constant for main plugin file
	if ( ! defined( 'CHOSEN_PRO_FILE' ) ) {
		define( 'CHOSEN_PRO_FILE', __FILE__ );
	}

	// set constant for plugin directory
	if ( ! defined( 'CHOSEN_PRO_PATH' ) ) {
		define( 'CHOSEN_PRO_PATH', plugin_dir_path( CHOSEN_PRO_FILE ) );
	}

	// set constant for plugin url
	if ( ! defined( 'CHOSEN_PRO_URL' ) ) {
		define( 'CHOSEN_PRO_URL', plugin_dir_url( __FILE__ ) );
	}

	// set constant for plugin basename
	if ( ! defined( 'CHOSEN_PRO_BASENAME' ) ) {
		define( 'CHOSEN_PRO_BASENAME', plugin_basename( CHOSEN_PRO_FILE ) );
	}

	require_once( CHOSEN_PRO_PATH . 'inc/colors.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/customizer.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/featured-videos.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/scripts.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/featured-sliders.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/featured-image-size.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/header-image.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/fonts.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/widget-areas.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/display-controls.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/footer-text.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/layout.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/page-layouts.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/spacing.php' );
	require_once( CHOSEN_PRO_PATH . 'inc/fixed-menu.php' );
	require_once( CHOSEN_PRO_PATH . 'licensing/licensing.php' );

	function ct_chosen_pro_init() {
		// check if meta slider plugin is active (for featured sliders)
		if ( class_exists( 'MetaSliderPlugin' ) ) {
			define( 'META_SLIDER_ACTIVE', true );
		}
	}
	add_action( 'plugins_loaded', 'ct_chosen_pro_init' );

	// add notice upon activating Author Pro
	function ct_chosen_pro_activation_notice() {

		// if option not yet set, display message
		if ( get_option( 'ct_chosen_pro_active' ) != 'active' ) { ?>
			<div class="updated">
				<p>
					<?php
					$customizer_url = add_query_arg(
						array(
							'url'    => get_home_url(),
							'return' => admin_url( 'plugins.php' )
						),
						admin_url( 'customize.php' )
					);
					printf( __( 'New features now available in the <a href="%s">Customizer</a>!', 'chosen-pro' ), esc_url( $customizer_url ) );
					?>
				</p>
			</div>
			<?php
			// now set option value so message isn't displayed again
			update_option( 'ct_chosen_pro_active', 'active' );
		}
	}
	add_action( 'admin_notices', 'ct_chosen_pro_activation_notice' );

	function ct_chosen_pro_deactivate() {
		// delete option so notice can show again upon activation
		delete_option( 'ct_chosen_pro_active' );
	}
	register_deactivation_hook( __FILE__, 'ct_chosen_pro_deactivate' );

	function ct_chosen_pro_load_textdomain() {
		load_plugin_textdomain( 'chosen-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	add_action( 'plugins_loaded', 'ct_chosen_pro_load_textdomain' );

	function ct_chosen_pro_mods_to_remove( $mods_array ) {

		$pro_mods = array(
			'header_image_type',
			'header_image_upload',
			'header_image_video',
			'header_image_homepage',
			'header_image_link_home',
			'header_image_height_type',
			'header_image_height',
			'header_image_parallax',
			'layout',
			'primary_font',
			'primary_font_weight',
			'heading_font',
			'heading_font_weight',
			'site_title_font',
			'site_title_font_weight',
			'featured_image_size',
			'display_site_title',
			'display_primary_menu',
			'display_post_title',
			'display_post_date',
			'display_more_link',
			'display_comments_link',
			'display_post_categories',
			'display_post_tags',
			'display_post_nav',
			'display_comment_count',
			'display_comment_date',
			'display_footer',
			'footer_text'
		);

		$color_sections = ct_chosen_pro_custom_colors_data();

		foreach ( $color_sections as $section ) {

			foreach ( $section as $setting ) {

				if ( is_array( $setting ) ) {
					$pro_mods[] = $setting['setting_id'];
				}
			}
		}

		$mods_array = array_merge( $mods_array, $pro_mods );

		return $mods_array;
	}
	add_action( 'ct_chosen_mods_to_remove', 'ct_chosen_pro_mods_to_remove' );

	function ct_chosen_pro_sanitize_css( $css ) {
		$css = wp_kses( $css, array( '\'', '\"' ) );
		$css = str_replace( '&gt;', '>', $css );

		return $css;
	}

	function ct_chosen_pro_post_classes($classes) {
		global $post;
		$featured_video = get_post_meta( $post->ID, 'ct_chosen_pro_video_key', true );
		$featured_slider = get_post_meta( $post->ID, 'ct_chosen_pro_slider_key', true );

		if ( $featured_video ) {
			$classes[] = 'has-featured-video';
		}
		if ( $featured_slider ) {
			$classes[] = 'has-featured-slider';
		}
		return $classes;
	}
	add_action( 'post_class', 'ct_chosen_pro_post_classes' );
}