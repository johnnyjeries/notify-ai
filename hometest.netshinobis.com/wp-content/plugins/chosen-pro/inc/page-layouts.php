<?php
defined( 'ABSPATH' ) OR exit;

function ct_chosen_pro_add_post_layout_meta_box() {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'ct_chosen_pro_post_layout',
			esc_html__( 'Layout', 'chosen-pro' ),
			'ct_chosen_pro_post_layout_callback',
			$screen,
			'side'
		);
	}
}
add_action( 'add_meta_boxes', 'ct_chosen_pro_add_post_layout_meta_box' );

function ct_chosen_pro_post_layout_callback( $post ) {

	wp_nonce_field( 'ct_chosen_pro_post_layout', 'ct_chosen_pro_post_layout_nonce' );
	
	$layout = get_post_meta( $post->ID, 'ct_chosen_pro_post_layout_key', true );
	?>
	<p>
		<select name="chosen-pro-post-layout" id="chosen-pro-post-layout" class="widefat">
			<option value="default"><?php esc_html_e( 'Use layout set in Customizer', 'chosen-pro' ); ?></option>
			<option value="right-sidebar" <?php if ( $layout == 'right-sidebar' ) {
				echo 'selected';
			} ?>><?php esc_html_e( 'Right sidebar', 'chosen-pro' ); ?>
			</option>
			<option value="left-sidebar" <?php if ( $layout == 'left-sidebar' ) {
				echo 'selected';
			} ?>><?php esc_html_e( 'Left sidebar', 'chosen-pro' ); ?>
			</option>
			<option value="one-column" <?php if ( $layout == 'one-column' ) {
				echo 'selected';
			} ?>><?php esc_html_e( 'One Column', 'chosen-pro' ); ?>
			</option>
			<?php 
			// add more options if editing blog page not set to homepage
			if ( $post->ID == get_option( 'page_for_posts' ) ) { ?>
				<option value="two-column" <?php if ( $layout == 'two-column' ) {
					echo 'selected';
				} ?>><?php esc_html_e( 'Two Columns', 'chosen-pro' ); ?>
				</option>
				<option value="two-right" <?php if ( $layout == 'two-right' ) {
					echo 'selected';
				} ?>><?php esc_html_e( 'Two Columns - right sidebar', 'chosen-pro' ); ?>
				</option>
				<option value="two-left" <?php if ( $layout == 'two-left' ) {
					echo 'selected';
				} ?>><?php esc_html_e( 'Two Columns - left sidebar', 'chosen-pro' ); ?>
				</option>
				<option value="three-column" <?php if ( $layout == 'three-column' ) {
					echo 'selected';
				} ?>><?php esc_html_e( 'Three Columns', 'chosen-pro' ); ?>
				</option>
			<?php } ?>
		</select>
	</p> <?php
}

function ct_chosen_pro_post_layout_save_data( $post_id ) {

	global $post;

	if ( ! isset( $_POST['ct_chosen_pro_post_layout_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['ct_chosen_pro_post_layout_nonce'], 'ct_chosen_pro_post_layout' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	/* it's safe to save the data now. */

	if ( isset( $_POST['chosen-pro-post-layout'] ) ) {

		$layout = $_POST['chosen-pro-post-layout'];

		if ( in_array( $layout, ct_chosen_pro_layouts() ) ) {
			update_post_meta( $post_id, 'ct_chosen_pro_post_layout_key', $layout );
		}
	}
}
add_action( 'pre_post_update', 'ct_chosen_pro_post_layout_save_data' );

function ct_chosen_pro_filter_layout( $layout ) {

	if ( is_home() ) {
		$id = get_queried_object_id();
	} else {
		global $post;
		$id = $post->ID;
	}
	
	$page_layout = get_post_meta( $id, 'ct_chosen_pro_post_layout_key', true );

	if ( ! empty( $page_layout ) && $page_layout != 'default' ) {
		$layout = $page_layout;
	}

	return $layout;
}
add_filter( 'ct_chosen_pro_layout_filter', 'ct_chosen_pro_filter_layout' );