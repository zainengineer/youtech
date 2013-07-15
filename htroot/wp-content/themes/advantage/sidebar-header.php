<?php
/**
 * @package advantage
 * @since advantage 1.0
 */
?>
<div id="header-widget" class="clearfix">
<?php
	if ( is_active_sidebar( 'left-widget-area' )  ) { ?>
	  <div id="left-header-widget" class="widget-area">
		<ul class="xoxo">
			<?php dynamic_sidebar( 'left-widget-area' ); ?>
		</ul>
	  </div>
<?php
	}
	if ( is_active_sidebar( 'right-widget-area' )  ) { ?>
	  <div id="right-header-widget" class="widget-area">
		<ul class="xoxo">
			<?php dynamic_sidebar( 'right-widget-area' ); ?>
		</ul>
	  </div>
<?php
	}
?>
</div>

