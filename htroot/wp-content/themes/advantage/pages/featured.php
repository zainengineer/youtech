<?php
/**
 * Template Name: Featured Home Page
 *
 * @package advantage
 * @since 1.0
 */
get_header();

	global $advantage_options, $content_width;
	
	$post_pp = -1; // All Posts
	if ( 1 == $advantage_options['fp_option']  && 0 == $advantage_options['fp_category'] )
		$post_pp = 5;
	$featured_args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $post_pp,
						'ignore_sticky_posts' => 1,
						'no_found_rows' => 1
						);
	if ( $advantage_options['fp_category'] > 0 && 1 == $advantage_options['fp_option'] )
		$featured_args['category__in'] = $advantage_options['fp_category'];
	elseif (2 == $advantage_options['fp_option']) {
	   $featured_args['meta_query'] = array(
       			array(
           			'key' => '_advantage_featured',
           			'value' => 1,
          			'compare' => 'IN' ) );
	}


	$featured = new WP_Query( $featured_args );

	$count = 0;
	if ( $featured->have_posts() ) {
		echo '<div id="featured-home" class="carousel slide';
		if ( 'fade' == $advantage_options['fp_effect'] )
			echo ' fading';
		echo '"><div class="carousel-inner">';
		while ( $featured->have_posts() ) {
			$featured->the_post();
			$readmore = get_post_meta( $post->ID, '_advantage_readmore', true );
			if ( empty( $readmore ) )
				$readmore = __( 'Learn More', 'advantage' );
			echo '<div class="item';
			if ( 0 == $count)
				echo ' active';
			echo '">';
			if ( has_post_thumbnail() )
				the_post_thumbnail( 'full', array(  'title' => get_the_title() ) );
			else
				echo '<img src="' . get_template_directory_uri() . '/images/header_bg.png" alt="" />';
			echo '<div class="container">';
			echo '<div class="carousel-caption">';
			echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			the_excerpt();
			echo '<p><a class="btn btn-primary btn-large" href="' . get_permalink() . '">';
			echo esc_attr( $readmore ) . '</a></p>';
			echo '</div></div></div>';
			$count++;
		}
		echo '</div>';
      	echo '<a class="left carousel-control" href="#featured-home" data-slide="prev">&lsaquo;</a>';
      	echo '<a class="right carousel-control" href="#featured-home" data-slide="next">&rsaquo;</a>';
		echo '<ol class="carousel-indicators">';
		for ( $i = 0; $i < $count; $i++ ) {
			echo '<li data-target=".carousel" data-slide-to="';
			if ( 0 == $i )
				echo '0" class="active"></li>';
			else
				echo $i . '"></li>';
		}
		echo '</ol></div>';
	}
	wp_reset_postdata();
	advantage_nav_menu();
	if ( ! empty( $advantage_options['headline'] ) || ! empty( $advantage_options['tagline'] ) ) { ?>
<div class="headline">
<div class="container-fluid">
<div class="row-fluid">
<?php
		if ( ! empty( $advantage_options['headline'] ) )
			echo '<h1>' . esc_attr( $advantage_options['headline'] ) . '</h1>';
		if ( ! empty( $advantage_options['tagline'] ) )
			echo '<div class="lead">' . esc_attr( $advantage_options['tagline'] ) . '</div>';
?>
</div>
</div>
</div>
<?php
	}
	get_sidebar('home');
	get_footer();