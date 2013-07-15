<?php
/**
 * The template for displaying all pages.
 *
 * @package advantage
 * @since advantage 1.0
 */
get_header(); ?>
<div id="content" class="<?php echo advantage_content_class(); ?>" role="main">
<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'content', 'page' );
		comments_template( '', true );
	}
?>
</div>
<?php get_sidebar(); ?>	
<?php get_footer(); ?>
