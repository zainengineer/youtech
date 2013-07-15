<?php
/**
 * The Sidebar containing the First and Second widget areas.
 *
 * @package advantage
 * @since advantage 1.0
 */
	global $advantage_options;

	$width = $advantage_options['sidebar1'] + $advantage_options['sidebar2'];
	if ( 3 != $advantage_options['sidebarpos'] && $width > 0 && is_active_sidebar( 'full-widget-area' ) ) {
		if ( ( $width + $advantage_options['content'] ) > 12 ) 
			$width = 12 - $advantage_options['content'];
		$sidebar_class = 'span' . $width;
		if ( 2 == $advantage_options['sidebarpos'] )
			$sidebar_class .= " pull" . $advantage_options['content'];
		 ?>
		<aside id="sidebar_full" class="<?php echo $sidebar_class; ?> widget-area blog-widgets" role="complementary">
			<ul class="xoxo">
<?php			dynamic_sidebar( 'full-widget-area' );	?>
			</ul>
		</aside>
<?php
	}
	if ( $advantage_options['sidebar1'] > 0 ) {
		$sidebar_class = 'span' . $advantage_options['sidebar1'];
		if ( 1 != $advantage_options['sidebarpos'] )
			$sidebar_class .= " pull" . $advantage_options['content'];
?>	
		<aside id="sidebar_one" class="<?php echo $sidebar_class; ?> widget-area blog-widgets" role="complementary">
		<ul class="xoxo">		
<?php		if ( is_active_sidebar( 'first-widget-area' ) ) {
				dynamic_sidebar( 'first-widget-area' );	
			}
			elseif ( ! is_active_sidebar( 'second-widget-area' ) || 0 == $advantage_options['sidebar2'] ) { //If no sidebar used at all, show some default widgets
				//advantage_default_widgets();				
			}
?>
		</ul>
		</aside>
<?php
	}
	// Second Sidebar
	if ( is_active_sidebar( 'second-widget-area' ) && ( $advantage_options['sidebar2'] > 0) ) {
		$sidebar_class = "span" . $advantage_options['sidebar2'];
		if ( 2 == $advantage_options['sidebarpos'] )
			$sidebar_class = $sidebar_class . " pull" . $advantage_options['content'];
?>
		<aside id="sidebar_two" class="<?php echo $sidebar_class; ?> widget-area blog-widgets" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'second-widget-area' ); ?>
			</ul>
		</aside>
<?php
	}
?>	
