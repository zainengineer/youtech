<?php
/**
 * The Template for displaying all single posts.
 *
 * @package advantage
 * @since advantage 1.0
 */
global $advantage_layout;
$advantage_layout = get_post_meta( $post->ID, '_advantage_layout', true);

get_header();
?>
	<div id="content" class="<?php echo $advantage_layout ? advantage_grid_full() : advantage_content_class(); ?>" role="main">
<?php	while ( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_format() ); ?>

			<nav id="nav-single" class="clearfix">
				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<i class="icon-chevron-left"></i>', 'Previous post link', 'advantage' ) . '</span> %title' ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '<i class="icon-chevron-right"></i>', 'Next post link', 'advantage' ) . '</span>' ); ?></span>
			</nav>
<?php		comments_template( '', true );
		} ?>
	</div>
<?php if ( empty( $advantage_layout ) ) get_sidebar(); ?>
<?php get_footer(); ?>
