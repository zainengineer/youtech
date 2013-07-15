<?php
/**
 * The template for displaying the footer.
 *
 * @package advantage
 * @since advantage 1.0
 */
?>
</div><!-- row -->
</div><!-- container -->
</div><!-- #main -->
<?php
	global $advantage_layout;
	
	if ( 2 != $advantage_layout )
		get_sidebar( 'footer' );
?>
<div id="footer">
	<div class="container-fluid">
		<div id="site-info" class="pull-left">
		<?php esc_attr_e('&copy;', 'advantage'); ?> <?php _e(date('Y')); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?></a>
		</div>
		<div id="site-generator" class="pull-right">
			<a href="<?php echo esc_url( __('http://www.xinthemes.com/','advantage')); ?>" title="<?php esc_attr_e('Designed by Stephen Cui', 'advantage'); ?>" rel="designer"><?php esc_attr_e('Advantage Theme', 'advantage'); ?></a>
		</div>
<?php
	if ( has_nav_menu( 'footer' ) ) {
		wp_nav_menu( array( 'container_class' => 'footer-menu', 'theme_location' => 'footer' ) );
    }
?>
	</div>
	<div class="back-to-top"><a href="#"><span class="icon-chevron-up"></span><?php _e(' TOP','advantage'); ?></a></div>
</div><!-- #footer -->
</div><!-- #wrapper -->
<?php wp_footer(); ?>
</body>
</html>
