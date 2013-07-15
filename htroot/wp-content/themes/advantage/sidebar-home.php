<?php
/** The home widget area
 * @package advantage
 * @since advantage 1.0
 */
	global $advantage_options;	 
	if (  0 == $advantage_options['column_home1'] && 0 == $advantage_options['column_home2'] && 0 == $advantage_options['column_home3'] && 0 == $advantage_options['column_home4'] && 0 == $advantage_options['column_home5'] )
		return;
	$flag = 1;
	$col = 0;
?>
<div id="home-widget-area">
<div class="container-fluid content-area">
<div class="row-fluid">
<?php
	if ( is_active_sidebar( 'first-home-widget-area' ) && $advantage_options['column_home1'] > 0 ) {
		$flag = 0;
		$col += $advantage_options['column_home1']; ?>
		<div id="first-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home1'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'first-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'second-home-widget-area' ) && $advantage_options['column_home2'] > 0) {
		$flag = 0;
		if ( $col >= 12 ) {
			echo '</div><div class="row-fluid">';
			$col = 0;			
		}
		$col += $advantage_options['column_home2']; ?>
		<div id="second-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home2'] ); ?> widget-area home-widget">	
			<ul class="xoxo">
				<?php dynamic_sidebar( 'second-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'third-home-widget-area' ) && $advantage_options['column_home3'] ) {
		$flag = 0;
		if ( $col >= 12 ) {
			echo '</div><div class="row-fluid">';
			$col = 0;			
		}
		$col += $advantage_options['column_home3']; ?>
		<div id="third-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home3'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'third-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'fourth-home-widget-area' ) && $advantage_options['column_home4'] ) {
		$flag = 0;
		if ( $col >= 12 ) {
			echo '</div><div class="row-fluid">';
			$col = 0;			
		}
		$col += $advantage_options['column_home4']; ?>
		<div id="fourth-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home4'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'fourth-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'fifth-home-widget-area' ) && $advantage_options['column_home5'] ) {
		$flag = 0;
		if ( $col >= 12 ) {
			echo '</div><div class="row-fluid">';
			$col = 0;			
		}
		$col += $advantage_options['column_home5']; ?>
		<div id="fifth-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home5'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'fifth-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	} ?>
</div></div></div>
<?php 
	if ( $flag ) { //No widget in home page ?>
<div class="container-fluid content-area">
<div class="row-fluid">
<?php
		get_template_part( 'pages/blog' );
	}

