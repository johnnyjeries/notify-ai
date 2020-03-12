<?php
defined( 'ABSPATH' ) OR exit;

function ct_chosen_pro_add_body_classes( $classes ) {

	$blog_layout     = get_theme_mod( 'layout' );
	$blog_layout 		 = apply_filters( 'ct_chosen_pro_layout_filter', $blog_layout );
	$post_layout     = get_theme_mod( 'layout_posts' );
	$post_layout 		 = apply_filters( 'ct_chosen_pro_layout_filter', $post_layout );
	$page_layout     = get_theme_mod( 'layout_pages' );
	$page_layout     = apply_filters( 'ct_chosen_pro_layout_filter', $page_layout );
	$archives_layout = get_theme_mod( 'layout_archives' );
	$search_layout 	 = get_theme_mod( 'layout_search' );

	if ( !empty( $post_layout ) && is_singular( 'post' ) ) {
		$classes[] = $post_layout;
	} 
	if ( !empty( $page_layout ) && is_singular( 'page' ) ) {
		$classes[] = $page_layout;
	}
	if ( !empty( $blog_layout ) && is_home() ) {
		$classes[] = $blog_layout;
	}
	if ( !empty( $archives_layout ) && is_archive() ) {
		$classes[] = $archives_layout;
	}
	if ( !empty( $search_layout ) && is_search() ) {
		$classes[] = $search_layout;
	}

	return $classes;
}
add_action( 'body_class', 'ct_chosen_pro_add_body_classes' );

function ct_chosen_pro_register_primary_sidebar() {

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'chosen-pro' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Widgets in this area will be shown in the Sidebar (based on the layout you choose in the Customizer)', 'chosen-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
}
add_action( 'widgets_init', 'ct_chosen_pro_register_primary_sidebar' );

function ct_chosen_pro_add_primary_sidebar() {

	// don't include on WooCommerce account pages
	if ( function_exists( 'is_account_page' ) ) {
		if ( is_account_page() || is_cart() || is_checkout() ) {
			return;
		}
	}
	$add_sidebar = false;
	// always add in Customizer so it can be hidden with CSS and shown instantly with postMessage
	if ( is_customize_preview() ) {
		$add_sidebar = true;
	}
	// add based on page type
	$blog_layout 		 = get_theme_mod( 'layout' );
	$blog_layout 		 = apply_filters( 'ct_chosen_pro_layout_filter', $blog_layout );
	$post_layout     = get_theme_mod( 'layout_posts' );
	$post_layout 		 = apply_filters( 'ct_chosen_pro_layout_filter', $post_layout );
	$page_layout     = get_theme_mod( 'layout_pages' );
	$page_layout     = apply_filters( 'ct_chosen_pro_layout_filter', $page_layout );
	$archives_layout = get_theme_mod( 'layout_archives' );
	$search_layout 	 = get_theme_mod( 'layout_search' );

	if ( is_home() && in_array( $blog_layout, ct_chosen_pro_layouts( 'sidebar' ) ) ) {
		$add_sidebar = true;
	} elseif ( is_singular( 'post' ) && in_array( $post_layout, ct_chosen_pro_layouts( 'sidebar' ) ) ) {
		$add_sidebar = true;
	} elseif ( is_singular( 'page' ) && in_array( $page_layout, ct_chosen_pro_layouts( 'sidebar' ) ) ) {
		$add_sidebar = true;
	} elseif ( is_archive() && in_array( $archives_layout, ct_chosen_pro_layouts( 'sidebar' ) ) ) {
		$add_sidebar = true;
	} elseif ( is_search() && in_array( $search_layout, ct_chosen_pro_layouts( 'sidebar' ) ) ) {
		$add_sidebar = true;
	}

	if ( $add_sidebar ) {
		include( 'widget-areas/sidebar-primary.php' );
	}
}
add_action( 'after_main', 'ct_chosen_pro_add_primary_sidebar' );

function ct_chosen_pro_layouts( $type = '' ) {

	if ( $type == 'sidebar' ) {
		$layouts = array(
			'right-sidebar',
			'left-sidebar',
			'two-right',
			'two-left'
		);
	} elseif ( $type == 'page-layouts' ) {
		$layouts = array(
			'one-column',
			'right-sidebar',
			'left-sidebar',
		);
	} else {
		$layouts = array(
			'default',
			'two-column',
			'one-column',
			'right-sidebar',
			'left-sidebar',
			'two-right',
			'two-left',
			'three-column'
		);
	}

	return $layouts;
}