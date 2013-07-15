<?php
/**
 * @package advantage
 * @since 1.0
 */
get_header(); ?>

<div id="content" class="<?php echo advantage_content_class(); ?>" role="main">
<?php
	if ( have_posts() ) {
		advantage_content_nav( 'nav-above' );
		while ( have_posts() ) {
			the_post();
			if ( is_search() )
				get_template_part( 'content', 'summary' );
			else
				get_template_part( 'content', get_post_format() );
		}				
		advantage_content_nav( 'nav-below' );
	} elseif ( current_user_can( 'edit_posts' ) ) {
		get_template_part( 'content-none', 'index' );
	} ?>						
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
