<?php
/**
 * Template Name: Blog Summary
 *
 * @package advantage
 * @since 1.0.1
 */
get_header();

    if ( get_query_var('paged') )
	    $paged = get_query_var('paged');
	elseif ( get_query_var('page') ) 
	    $paged = get_query_var('page');
	else 
		$paged = 1;
	
	global $advantage_thumbnail, $advantage_display_excerpt, $advantage_entry_meta;	
	
	if ( have_posts() && is_page()) {
		the_post();
		$pt_category = get_post_meta($post->ID, '_advantage_category', true);

		$column = get_post_meta($post->ID, '_advantage_column', true);
		if ('' == $column)
			$column = 3;

		$postperpage = get_post_meta($post->ID, '_advantage_postperpage', true);
		if ($postperpage < $column)
			$postperpage = 12;

		$pt_thumbnail = get_post_meta($post->ID, '_advantage_thumbnail', true);
		$pt_size_x = get_post_meta($post->ID, '_advantage_size_x', true);
		$pt_size_y = get_post_meta($post->ID, '_advantage_size_y', true);
			
		$advantage_thumbnail = advantage_thumbnail_size($pt_thumbnail, $pt_size_x, $pt_size_y);

		$advantage_display_excerpt = get_post_meta($post->ID, '_advantage_intro', true);
		if ('' == $advantage_display_excerpt)
			$advantage_display_excerpt = 1;

		$advantage_entry_meta = get_post_meta($post->ID, '_advantage_disp_meta', true);
		$sidebar = get_post_meta($post->ID, '_advantage_sidebar', true);
		
		advantage_template_intro();
	}
	else {
		$pt_category = '';
		$advantage_display_excerpt = 1;
		$column = 1;
		$postperpage = 0;
		$advantage_thumbnail = 'thumbnail';
		$advantage_entry_meta = 1;
		$sidebar = 1;
	}

?>  
<div id="content" class="<?php echo $sidebar ? advantage_content_class() : advantage_grid_full(); ?> advantage_recent_post" role="main">
<?php 
	$blog_args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'paged'	=> $paged,
						'posts_per_page' => $postperpage,
						'ignore_sticky_posts' => 1,
						);
	if ($pt_category) {
		$blog_args['category__in'] = $pt_category;
	}
	$blog = new WP_Query( $blog_args );	
	if ( $blog->have_posts() ) :
		advantage_content_nav_link( $blog->max_num_pages, 'nav-above' );
		$col = 0;
		while ( $blog->have_posts() ) {
			$blog->the_post();
			
			if ( $column  > 1 && 0 == $col )
				echo '<div class="row">';
			$div_class = '';
			if ($column == 2) {
				$div_class = "large-6 columns";
				$col = $col + 1;
				if ($col == 2)
					$col = 0;
			}
			elseif ($column == 3) {
				$div_class = "large-4 columns";
				$col = $col + 1;
				if ($col == 3)
					$col = 0;
			}
			elseif ($column == 4) {
				$div_class = "large-3 columns";
				$col = $col + 1;
				if ($col == 4)
					$col = 0;
			}

			if  ($column > 1)
				echo '<div class="' . $div_class .'">';
			get_template_part( 'content', 'summary' );
				
			if  ($column > 1) {
				echo '</div>';				
				if ($col == 0)
					echo '</div>';
			}
		}				
		if ( $col > 0 )
			echo '</div>';				
		advantage_content_nav_link( $blog->max_num_pages, 'nav-below' );
	endif;	
	wp_reset_postdata();
?>						
</div>
<?php if ($sidebar) get_sidebar(); ?>
<?php get_footer(); ?>
