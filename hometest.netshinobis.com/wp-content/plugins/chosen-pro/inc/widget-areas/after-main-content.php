<?php if ( is_active_sidebar( 'after-main' ) ) :
	$widgets      = get_option( 'sidebars_widgets' );
	$widget_count = count( $widgets['after-main'] );
	?>
	<div class="sidebar sidebar-after-main-content active-<?php echo absint( $widget_count ); ?>"
	     id="sidebar-after-main-content">
		<?php dynamic_sidebar( 'after-main' ); ?>
	</div>
<?php endif;