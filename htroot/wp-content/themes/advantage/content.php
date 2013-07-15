<?php
/**
 * The default template for displaying content
 *
 * @package advantage
 * @since advantage 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	advantage_display_post_thumbnail($post->ID); ?>
	<header class="entry-header">
<?php
	advantage_post_meta_top();
	advantage_post_title();
	advantage_post_meta();
?>
	</header>
	<div class="entry-content clearfix">
<?php
		the_content( __( '<span class="more-link">read more</span>', 'advantage' ) );
		wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'advantage' ) . '</span>', 'after' => '</div>' ) ); 
?>
	</div>
	<?php advantage_single_post_link(); ?>	
	<footer class="entry-footer clearfix">
		<?php advantage_post_tag(); ?>
	</footer>
</article>
