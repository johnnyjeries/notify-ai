<?php
defined( 'ABSPATH' ) OR exit;

/********** Register Widget Areas **********/

function ct_chosen_pro_register_widget_areas() {

	// After post content
	register_sidebar( array(
		'name'          => esc_html__( 'After Post Content', 'chosen-pro' ),
		'id'            => 'after-post',
		'description'   => esc_html__( 'Widgets in this area will be shown after the post content', 'chosen-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	// After page content
	register_sidebar( array(
		'name'          => esc_html__( 'After Page Content', 'chosen-pro' ),
		'id'            => 'after-page',
		'description'   => esc_html__( 'Widgets in this area will be shown after the page content', 'chosen-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	// Before main content
	register_sidebar( array(
		'name'          => esc_html__( 'Before Main Content', 'chosen-pro' ),
		'id'            => 'before-main',
		'description'   => esc_html__( 'Widgets in this area will be shown after the site title and above the posts', 'chosen-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	// After main content
	register_sidebar( array(
		'name'          => esc_html__( 'After Main Content', 'chosen-pro' ),
		'id'            => 'after-main',
		'description'   => esc_html__( 'Widgets in this area will be shown below the posts/page and above the footer', 'chosen-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	// Footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'chosen-pro' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Widgets in this area will be shown in the footer', 'chosen-pro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
}
add_action( 'widgets_init', 'ct_chosen_pro_register_widget_areas' );

/********** Add Widget Areas to Front-end **********/

// After Post Content
function ct_chosen_pro_after_post_content_widgets() {
	include( 'widget-areas/after-post-content.php' );
}
add_action( 'post_after', 'ct_chosen_pro_after_post_content_widgets' );

// After Page Content
function ct_chosen_pro_after_page_content_widgets() {
	include( 'widget-areas/after-page-content.php' );
}
add_action( 'page_after', 'ct_chosen_pro_after_page_content_widgets' );

// Before  Main Content
function ct_chosen_pro_before_main_content_widgets() {
	include( 'widget-areas/before-main-content.php' );
}
add_action( 'after_header', 'ct_chosen_pro_before_main_content_widgets' );

// After  Main Content
function ct_chosen_pro_after_main_content_widgets() {
	include( 'widget-areas/after-main-content.php' );
}
add_action( 'main_bottom', 'ct_chosen_pro_after_main_content_widgets' );

// Footer
function ct_chosen_pro_footer_widgets() {
	include( 'widget-areas/footer.php' );
}
add_action( 'footer_top', 'ct_chosen_pro_footer_widgets' );