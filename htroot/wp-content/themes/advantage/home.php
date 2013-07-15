<?php
/**
 * Default Home Page / Blog Index
 * 
 * @package advantage
 * @since 1.0
 */
	global $advantage_options;
	get_header();
	
	if ( 'page' == get_option( 'show_on_front' ) || 2 == $advantage_options['homepage'] ) { // Blog Index 
?>  
	<div id="content" class="<?php echo advantage_content_class(); ?>" role="main">
<?php
		if ( have_posts() ) {
			advantage_content_nav( 'nav-above' );
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_format() );
			}				
			advantage_content_nav( 'nav-below' );
		} elseif ( current_user_can( 'edit_posts' ) ) {
			get_template_part( 'content-none', 'index' );
		} ?>						
	</div>
<?php
		get_sidebar();
	} elseif ( 1 == $advantage_options['homepage'] ) {
		get_template_part( 'pages/featured'  );
	}
	get_footer();
?>