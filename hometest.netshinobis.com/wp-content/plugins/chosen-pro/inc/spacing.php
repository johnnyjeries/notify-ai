<?php
defined( 'ABSPATH' ) OR exit;

function ct_chosen_pro_apply_spacing() {

	$above_logo = get_theme_mod( 'spacing_above_logo' );
	$below_logo = get_theme_mod( 'spacing_below_logo' );
	$css        = '';

	if ( $above_logo != 72 && $above_logo !== '' ) {
		$css .= '.title-container {margin-top: ' . $above_logo . 'px;}';
	}
	if ( $below_logo != 96 && $below_logo  !== '' ) {
		$css .= '.title-container {margin-bottom: ' . $below_logo . 'px;}';
	}

	if ( ! empty( $css ) ) {
		$css = ct_chosen_pro_sanitize_css( $css );

		wp_add_inline_style( 'ct-chosen-style-rtl', $css );
		wp_add_inline_style( 'ct-chosen-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_chosen_pro_apply_spacing', 30 );