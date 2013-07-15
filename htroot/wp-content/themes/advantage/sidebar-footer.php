<?php
/**
 * @package advantage
 * @since 1.0
 */
?>

<div id="footer-widget-area" role="complementary">
<div class="container-fluid"><div class="row-fluid">
<?php
	global $advantage_options;	
	if ( is_active_sidebar( 'first-footer-widget-area' ) && $advantage_options['column_footer1'] > 0 ) { ?>
		<div id="first" class="<?php echo advantage_grid_columns( $advantage_options['column_footer1'] ); ?> widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'second-footer-widget-area' ) && $advantage_options['column_footer2'] > 0) { ?>
		<div id="second" class="<?php echo advantage_grid_columns( $advantage_options['column_footer2'] ); ?> widget-area">	
			<ul class="xoxo">
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'third-footer-widget-area' ) && $advantage_options['column_footer3'] ) { ?>
		<div id="third" class="<?php echo advantage_grid_columns( $advantage_options['column_footer3'] ); ?> widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'fourth-footer-widget-area' ) && $advantage_options['column_footer4'] ) { ?>
		<div id="fourth" class="<?php echo advantage_grid_columns( $advantage_options['column_footer4'] ); ?> widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
			</ul>
		</div>
<?php
	} ?>
</div></div>
</div>