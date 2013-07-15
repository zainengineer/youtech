<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advantage
 * @since advantage 1.0
 */
get_header(); ?>
<div id="content" class="<?php echo advantage_content_class(); ?> clearfix" role="main">
	<?php get_template_part( 'content-none' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
