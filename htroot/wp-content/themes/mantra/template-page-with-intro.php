<?php /*
Template Name: Category page with intro
*/ ?>


<?php get_header(); ?>

<section id="container">
	<div id="content" role="main">

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mantra' ), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'mantra' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			<div style="clear: both;"></div>
		</div>
		<?php
		$slug = basename(get_permalink());
		$meta_slug = get_post_meta(get_the_ID(), "slug", $single); // slug custom field
		$meta_catid = get_post_meta(get_the_ID(), "catid", $single); // category_id custom field
		$key = get_post_meta(get_the_ID(), "key", $single); // either slug or category_id custom field
		$slug = ($key?$key:($meta_catid?$meta_catid:($meta_slug?$meta_slug:($slug?$slug:0)))); // select one value out of the custom fields 	
		?>
	<?php endwhile; else: endif; ?>
	<hr>
	<br />
	<?php 
           // replace $slub with get_the_title() in the line below if you want to get posts based
           // on category name instead of slug  ?>
	<?php 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if (is_numeric($slug)&&($slug>0)): 
			query_posts('cat='.$slug.'&post_status=publish,future&orderby=date&order=desc&posts_per_page='.get_option('posts_per_page').'&paged=' . $paged); 
		else: 
			query_posts('category_name='.$slug.'&post_status=publish,future&orderby=date&order=desc&posts_per_page='.get_option('posts_per_page').'&paged=' . $paged); 
		endif; 
	?>
	<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php if($mantra_pagination=="Enable") mantra_pagination(); else mantra_content_nav( 'nav-below' ); ?>
		
	</div><!-- #content -->
	
	<?php get_sidebar(); ?>
	
</section><!-- #container -->

<?php get_footer(); ?>
