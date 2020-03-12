<?php
defined( 'ABSPATH' ) OR exit;

function ct_chosen_pro_fixed_menu( $classes ) {

	if ( get_theme_mod( 'fixed_menu' ) == 'yes' ) {
		$classes[] = 'fixed-menu';
	}

	return $classes;
}
add_filter( 'body_class', 'ct_chosen_pro_fixed_menu' );