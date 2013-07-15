<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package advantage
 * @since advantage 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content clearfix">
<?php	the_content();
		wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'advantage' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>
	<footer class="entry-meta clearfix">
<?php
		edit_post_link( '<i class="icon-pencil"></i> ' . __( '[Edit]', 'advantage' ), '<span class="edit-link">', '</span>' );
?>				
	</footer>
</article>
