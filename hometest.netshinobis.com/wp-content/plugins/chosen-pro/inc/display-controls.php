<?php
defined( 'ABSPATH' ) OR exit;

function ct_chosen_pro_display_controls_css() {

	$css = '';

	if ( get_theme_mod( 'display_site_title' ) == 'hide' ) {
		$css .= '.site-title { display: none; }';
	}
	if ( get_theme_mod( 'display_tagline' ) == 'hide' ) {
		$css .= '.tagline { display: none; }';
	}
	if ( get_theme_mod( 'display_primary_menu' ) == 'hide' ) {
		$css .= '.menu-primary, .toggle-navigation { display: none; }';
	}
	if ( get_theme_mod( 'display_post_title' ) == 'hide' ) {
		$css .= '.post-title { display: none; }';
	}
	if ( get_theme_mod( 'display_post_date' ) == 'hide' ) {
		$css .= '.post-date { display: none; }';
	}
	if ( get_theme_mod( 'display_more_link' ) == 'hide' ) {
		$css .= '.more-link { display: none; }';
	}
	if ( get_theme_mod( 'display_comments_link' ) == 'hide' ) {
		$css .= '.full-post .comments-link, .comments-link { display: none; }';
		$css .= '.more-link { margin-right: 0; }';
	}
	if ( get_theme_mod( 'display_post_categories' ) == 'hide' ) {
		$css .= '.post-categories { display: none; }';
	}
	if ( get_theme_mod( 'display_post_tags' ) == 'hide' ) {
		$css .= '.post-tags, .post-meta .tags { display: none; }';
	}
	if ( get_theme_mod( 'display_post_nav' ) == 'hide' ) {
		$css .= '.further-reading { display: none; }';
	}
	if ( get_theme_mod( 'display_comment_count' ) == 'hide' ) {
		$css .= '.comments-number { display: none; }';
	}
	if ( get_theme_mod( 'display_comment_date' ) == 'hide' ) {
		$css .= '.comment-date { display: none; }';
		$css .= '.comment-reply-link { margin-left: 0; }';
		$css .= '.comment-reply-link:after { display: none; }';
	}
	if ( get_theme_mod( 'display_archive_title' ) == 'hide' ) {
		$css .= '.archive-header { display: none; }';
	}
	if ( get_theme_mod( 'display_footer' ) == 'hide' ) {
		$css .= '.site-footer { display: none; }';
	}

	$css = ct_chosen_pro_sanitize_css( $css );

	wp_add_inline_style( 'ct-chosen-style', $css );
	wp_add_inline_style( 'ct-chosen-style-rtl', $css );
}
add_action( 'wp_enqueue_scripts', 'ct_chosen_pro_display_controls_css', 99 );