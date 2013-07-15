<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	global $more; //WordPress global variable
	global $advantage_thumbnail, $advantage_display_excerpt, $advantage_entry_meta;
	
	if ( ! isset( $advantage_display_excerpt ) )
		$advantage_display_excerpt = 1;
	if ( ! isset( $advantage_thumbnail ) )
		$advantage_thumbnail = 'thumbnail';
	if ( ! isset( $advantage_entry_meta ) )
		$advantage_entry_meta = 1;
	$displayed_thumnnail = 0;
	if ( has_post_thumbnail() && ( 'none' != $advantage_thumbnail ) ) {
		$displayed_thumnnail = 1;
?>	
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'advantage' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail($advantage_thumbnail, array( 'class' => 'post-thumbnail', 'title' => get_the_title() ) ); ?></a>
    <?php
		if ( is_sticky() ) {
			echo '<div class="featured-container">';
			if ( has_action('advantage_featured_logo') )
				do_action('advantage_featured_logo');
			else
				echo '<p><i class="icon-star"></i></p>';
			echo '</div>';
		}	
	}
	?>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'advantage' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-summary clearfix">
<?php 	
		if ( 1 == $advantage_display_excerpt ) {
				the_excerpt();
		}
		elseif ( 2 == $advantage_display_excerpt ) {
			$more = 0;
			if ( $displayed_thumnnail )
				add_filter( 'the_content', 'advantage_remove_images', 100 );
			the_content( '' );		
			if ( $displayed_thumnnail )
				remove_filter( 'the_content', 'advantage_remove_images', 100 );
		}
?>
	</div>
<?php
	advantage_single_post_link();
	advantage_post_summary_meta();
?>
</article>
