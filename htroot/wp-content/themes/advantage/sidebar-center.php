<?php
/**
 * @package advantage
 * @since 1.0
 */
?>
<?php
	if ( is_active_sidebar( 'center-widget-area' )  ) { ?>
	  <div id="center-header-widget" class="widget-area">
		<ul class="xoxo">
			<?php dynamic_sidebar( 'center-widget-area' ); ?>
		</ul>
	  </div>
<?php
	}
?>