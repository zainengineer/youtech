<?php
/**
 * Template Name: Full Width
 *
 * @package advantage
 * @since advantage 1.0
 */
get_header(); ?>
<div id="content" class="<?php echo advantage_grid_full(); ?>" role="main">
<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'content', 'page' );
		comments_template( '', true );
	}
?>
</div>
<?php get_footer(); ?>
