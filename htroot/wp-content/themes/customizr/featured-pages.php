<?php
/**
 * The template displaying the front page widget areas.
 *
 *
 * @package Customizr
 * @since Customizr 1.0
 */

//global customizr options array
global $tc_theme_options;

//get display options
$tc_show_featured_pages 	= esc_attr( $tc_theme_options['tc_show_featured_pages']);
$tc_show_featured_pages_img = esc_attr( $tc_theme_options['tc_show_featured_pages_img']);

//set the areas array
$areas = array ('one','two','three');

?>

<?php if ($tc_show_featured_pages  != 0) : ?>
	<div class="container marketing">
		<div class="row widget-area" role="complementary">
			<?php foreach ($areas as $area) : ?>
				<div class="span4">
					<?php 
						if ( !empty( $tc_theme_options['tc_featured_page_'.$area] ) )  {
							tc_get_featured_pages($area,$tc_show_featured_pages_img);
						}
						else {
							tc_get_featured_pages('not-set',$tc_show_featured_pages_img);
						}
					 ?>
				</div>
			<?php endforeach; ?>
		</div><!-- .row widget-area -->
	</div><!-- .container -->
	<hr class="featurette-divider">
<?php endif; ?>