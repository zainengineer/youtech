<?php

if ( ! defined( 'ADVANTAGE_VERSION' ) )
	define( 'ADVANTAGE_VERSION', '1.0.0' );
	
add_action( 'after_setup_theme', 'advantage_setup' );
if ( ! function_exists( 'advantage_setup' ) ):
function advantage_setup() {
	global $content_width;
	if ( ! isset( $content_width ) ) 
		$content_width = 700;

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'link', 'quote' ) );

	load_theme_textdomain( 'advantage', get_template_directory() . '/languages' );
	add_editor_style();
	add_theme_support( 'custom-background', array(
		'default-color' => '', //Default background color
	) );
	$custom_header_support = array(
		'default-image'		=> get_template_directory_uri() . '/images/logo.png',
		'flex-width'        => true,
		'flex-height'		=> true,
	    'header-text'		=> true,
		'default-text-color' => '000000',		
		'width' 			=> apply_filters( 'advantage_header_image_width', 200 ),
		'height' 			=> apply_filters( 'advantage_header_image_height', 60 ),
		// Callback for styling the header.
		'wp-head-callback' => 'advantage_header_style',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'advantage_admin_header_style',
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => 'advantage_admin_header_image',
	);
	add_theme_support( 'custom-header', $custom_header_support );	
	register_default_headers( array(
		'header' => array(
			'url' => '%s/images/logo.png',
			'thumbnail_url' => '%s/images/logo.png',
			'description' => __( 'Logo', 'advantage' )
		),
	) );
	
	remove_filter('term_description','wpautop');
						
	register_nav_menus( array(
		'section-menu' => __( 'Section Menu', 'advantage' ),
		'footer' => __( 'Footer Menu', 'advantage' ),
	));
}
endif;

function advantage_widgets_init() {
	register_widget( 'advantage_Recent_Post' );
	register_widget( 'advantage_Navigation' );
	register_widget( 'advantage_Marketing' );
	
	// Full Sidebar 
	register_sidebar( array(
		'name' => __( 'Blog Widget Area (Full)', 'advantage' ),
		'id' => 'full-widget-area',
		'description' => __( 'Available for Left or Right sidebar layout.', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	// First Sidebar - left or right
	register_sidebar( array(
		'name' => __( 'Blog Widget Area 1', 'advantage' ),
		'id' => 'first-widget-area',
		'description' => __( 'Blog Widget Area 1', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Second Sidebar - left or right
	register_sidebar( array(
		'name' => __( 'Blog Widget Area 2', 'advantage' ),
		'id' => 'second-widget-area',
		'description' => __( 'Blog Widget Area 2', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Header Widget Area
	register_sidebar( array(
		'name' => __( 'Header Widget Area (Left)', 'advantage' ),
		'id' => 'left-widget-area',
		'description' => __( 'Header Widget Area (Left)', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Widget Area (Right)', 'advantage' ),
		'id' => 'right-widget-area',
		'description' => __( 'Header Widget Area (Right)', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Header Widget Area (Center)', 'advantage' ),
		'id' => 'center-widget-area',
		'description' => __( 'Header Widget Area (Center)', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Home Widget Areas
	register_sidebar( array(
		'name' => __( 'Home Widget Area 1', 'advantage' ),
		'id' => 'first-home-widget-area',
		'description' => __( 'Home Widget Area 1', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Widget Area 2', 'advantage' ),
		'id' => 'second-home-widget-area',
		'description' => __( 'Home Widget Area 2', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Widget Area 3', 'advantage' ),
		'id' => 'third-home-widget-area',
		'description' => __( 'Home Widget Area 3', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Widget Area 4', 'advantage' ),
		'id' => 'fourth-home-widget-area',
		'description' => __( 'Home Widget Area 4', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Widget Area 5', 'advantage' ),
		'id' => 'fifth-home-widget-area',
		'description' => __( 'Home Widget Area 5', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Footer Widgets
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 1', 'advantage' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'Footer Widget Area 1', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Area 2', 'advantage' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Footer Widget Area 2', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Area 3', 'advantage' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'Footer Widget Area 3', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Area 4', 'advantage' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'Footer Widget Area 4', 'advantage' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
/** Register sidebars by running advantage_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'advantage_widgets_init' );

if ( ! function_exists( 'advantage_header_style' ) ) :
function advantage_header_style() {
	$text_color = get_header_textcolor();
	if ( $text_color == HEADER_TEXTCOLOR ) //Default Text Color. Doing Nothing
		return;
?>
<style type="text/css">
<?php
	if ( 'blank' == $text_color ) { // Blog Text is unchecked
?>
#site-title,
#site-description {
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
	clip: rect(1px, 1px, 1px, 1px);
}
<?php
	} else { // Custom color
?>
#site-title a,
#site-description {
	color: #<?php echo $text_color; ?> !important;
}
<?php
	}
?>
</style>
<?php
}
endif;

if ( ! function_exists( 'advantage_comment' ) ) :
function advantage_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) {
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'advantage' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( '<i class="icon-pencil"></i> ' . __( '[Edit]', 'advantage' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-meta">
<?php 				echo get_avatar( $comment, 40 );
					printf( '<cite class="fn">%1$s</cite>', get_comment_author_link() );  ?>
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						printf( __( '%1$s at %2$s', 'advantage' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( '<i class="icon-pencil"></i> ' . __( '[Edit]', 'advantage' ), ' ' );					
					if ( $comment->comment_approved == '0' ) { ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'advantage' ); ?></em>
<?php 				}; ?>
				</div>
			</footer>
			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article>
	<?php
			break;
	}
}
endif;

function advantage_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'advantage_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 */
function advantage_continue_reading_link() {
	global $post;
	$readmore = get_post_meta( $post->ID, '_advantage_readmore', true );
	if ( empty( $readmore ) )
		$readmore = __( 'read more', 'advantage' );
	$link = ' <a class="more-link" href="'. get_permalink() . '">' . $readmore . '</a>';
	return $link;
}

function advantage_auto_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'advantage_auto_excerpt_more' );

function advantage_custom_excerpt_more( $output ) {
	if ( ! is_attachment() ) {
		$output .= advantage_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'advantage_custom_excerpt_more' );

if ( ! function_exists( 'advantage_content_nav' ) ) :
/** Pagination for main loop */
function advantage_content_nav( $nav_id ) {
	global $wp_query;
	advantage_content_nav_link( $wp_query->max_num_pages, $nav_id );
}
endif;

if ( ! function_exists( 'advantage_content_nav_link' ) ) :
/** Pagination */
function advantage_content_nav_link( $num_of_pages, $nav_id ) {
	if ( $num_of_pages > 1 ) {
		echo '<nav id="' . $nav_id . '">';
		echo '<div class="pagination pagination-centered">';

		$big = 999999999;
    	if ( get_query_var( 'paged' ) )
	    	$current_page = get_query_var( 'paged' );
		elseif ( get_query_var( 'page' ) ) 
	   	 	$current_page = get_query_var( 'page' );
		else 
			$current_page = 1;
		$links =  paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, $current_page ),
			'total' => $num_of_pages,
			'mid_size' => 3,
			'prev_text'    => '<i class="icon-chevron-left"></i>' ,
			'next_text'    => '<i class="icon-chevron-right"></i>' ,
			'type' => 'array' ) );
		echo '<ul><li><span>' . __( 'Page', 'voyage' ) . '</span></li>';
		foreach ( $links as $link )
			printf( '<li>%1$s</li>', $link );
		echo '</ul></div></nav>';
	}
}
endif;

/**
 * Replace rel="category tag" with rel="tag"
 * For W3C validation purposes only.
 */
function advantage_replace_rel_category ($output) {
    $output = str_replace(' rel="category tag"', ' rel="tag"', $output);
    return $output;
}
add_filter('wp_list_categories', 'advantage_replace_rel_category');
add_filter('the_category', 'advantage_replace_rel_category');

if ( ! function_exists( 'advantage_meta_category' ) ) :
// Prints Post Categories
function advantage_meta_category( $meta_icon = 0 ) {
	$categories = wp_get_post_categories( get_the_ID() , array('fields' => 'ids'));
	if( $categories ) {
 		$sep = ' &bull; ';
 		$cat_ids = implode( ',' , $categories );
 		$cats = wp_list_categories( 'title_li=&style=none&echo=0&include='.$cat_ids);
 		$cats = rtrim( trim( str_replace( '<br />',  $sep, $cats) ), $sep);
		echo '<span class="entry-category">';
		if ( 1 == $meta_icon )
			echo '<i class="icon-folder-open meta-icon"></i>';
		else
		echo '<span class="meta-prep">' . __( 'Filed in ', 'advantage') . '</span>';	
 		echo  $cats;
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'advantage_meta_author' ) ) :
function advantage_meta_author( $meta_icon = 0 ) {
	printf( '<span class="by-author"><span class="meta-prep">%4$s</span><a class="url fn n" href="%1$s" title="%2$s" rel="author"> %3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'advantage' ), get_the_author() ) ),
		get_the_author(),
		$meta_icon ? '<i class="icon-user meta-icon"></i>' : 'By' );
}
endif;


if ( ! function_exists( 'advantage_meta_comment' ) ) :
// Prints Comments Link
function advantage_meta_comment( $meta_icon = 0 ) {
	if ( comments_open() && ! post_password_required() ) {
		$comment_icon = '<i class="icon-comment meta-icon"></i>';
		printf( '<span class="meta-comment">' );
		comments_popup_link( $comment_icon . __( 'Comment', 'advantage' ), $comment_icon . __( '1 Comment', 'advantage' ) , $comment_icon . __( '% Comments', 'advantage' ) );		
		printf( '</span>' );
	}
}
endif;

if ( ! function_exists( 'advantage_meta_date' ) ) :
// Prints Post Date
function advantage_meta_date( $meta_icon = 0 ) {
	if ( $meta_icon )
		echo '<i class="icon-calendar meta-icon"></i>';
	printf( __( '<time class="entry-date" datetime="%1$s">%2$s</time>', 'advantage' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ) );				

}
endif;

if ( ! function_exists( 'advantage_meta_tag' ) ) :
// Prints Post Tags
function advantage_meta_tag( $meta_icon = 0 ) {
	$tags_list = get_the_tag_list( '', __( ' &bull; ', 'advantage' ) );
	if ( $tags_list ) {
		echo '<span class="entry-tags"><i class="icon-tags meta-icon"> </i>';
		printf( '<span class="entry-tag">%1$s</span>',
		$tags_list );
		echo '</span>';
	} 
}
endif;

if ( ! function_exists( 'advantage_post_meta_top' ) ) :
function advantage_post_meta_top() {
	if ( 'post' == get_post_type() && ! is_single() ) {
		echo '<span class="entry-meta entry-meta-top">';		
		if ( is_sticky() ) {
			printf( '<span class="entry-featured">%1$s &bull;</span>', __( 'Featured ', 'advantage') );
		}
		advantage_meta_category();		
		echo '</span>';	
	}
}
endif;

if ( ! function_exists( 'advantage_post_meta' ) ) :
function advantage_post_meta() {
	if ( 'post' == get_post_type() ) {
		echo '<span class="entry-meta">';
		advantage_meta_date();
		advantage_meta_author();
		if ( is_single() ) {
			advantage_meta_category();				
		}
		advantage_meta_comment();			
		echo '</span>';	
	}
}
endif;

if ( ! function_exists( 'advantage_post_tag' ) ) :
// Prints tages, edit link at the bottom of the post
function advantage_post_tag() {
	printf ('<div class="entry-meta entry-meta-bottom">');	
	if ( 'post' == get_post_type() )
		advantage_meta_tag();
/*	if ( is_singular() && ! is_home() )
		printf( __(' <a href="%1$s" title="Permalink to %2$s" rel="bookmark">Permalink</a>', 'advantage' ),
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' )
			); */
	edit_post_link( '<i class="icon-pencil"></i> ' . __( '[Edit]', 'advantage' ), '<span class="edit-link">', '</span>' );
	echo '</div>';	
}
endif;

if ( ! function_exists( 'advantage_post_summary_meta' ) ) :
// Prints meta info for Post Summary
function advantage_post_summary_meta( $meta_flag = 0 ) {
	global $advantage_entry_meta;
	
	echo '<div class="entry-meta entry-meta-summary clearfix">';
	if ( ( $advantage_entry_meta || $meta_flag ) && 'post' == get_post_type() ) {
		advantage_meta_date( $meta_flag );
		advantage_meta_author( $meta_flag );
		advantage_meta_category( $meta_flag );
		advantage_meta_tag( $meta_flag );
		advantage_meta_comment( $meta_flag );
	}
	edit_post_link( '<i class="icon-pencil"></i> ' . __( '[Edit]', 'advantage' ), '<span class="edit-link">', '</span>' );	
	echo '</div>';	
}
endif;

function advantage_body_classes( $classes ) {
	global $advantage_options, $advantage_layout;
			
	if ( ! is_single() )
		$classes[] = 'multi';
	elseif ( 2 == $advantage_layout )
		$classes[] = 'fullscreen';

	if ( is_page_template( 'pages/featured.php' )
		|| ( is_home() && 1 == $advantage_options['homepage'] ) )
		$classes[] = 'featured-home';

	return $classes;
}
add_filter( 'body_class', 'advantage_body_classes' );

function advantage_scripts_method() {	
	global $advantage_options, $advantage_fonts;
	
	$theme_uri = get_template_directory_uri();
	// Check if the fonts are webfont, if yes, load the font.
	$advantage_fonts = advantage_fonts_array();
	$font_elements = array(
			'bodyfont','headingfont','entrytitlefont',
			'sitetitlefont','sitedescfont', 'mainmenufont',
			'sidebarfont', 'widgettitlefont', 'footerfont'
	);
	$fonts = array();
	foreach ( $font_elements as $element ) {
		if ( $advantage_options[$element] > 0
				&& ! in_array( $advantage_options[ $element ], $fonts) )
			$fonts[] = $advantage_options[ $element ];		
	}

	foreach ( $fonts as $font ) {
		if ( ! empty( $advantage_fonts[ $font ]['url'] ) )
			wp_enqueue_style( str_replace(' ', '', $advantage_fonts[ $font ]['label']), $advantage_fonts[ $font ]['url'], false, 1.0 );
	}
	
	wp_enqueue_style('bootstrap', $theme_uri . '/css/bootstrap.min.css', null, '2.3.1');
	wp_enqueue_style('fontawesome', $theme_uri . '/css/font-awesome.min.css', array( 'bootstrap' ), '3.0.2' );
	wp_enqueue_style('advantage', $theme_uri . '/dev/advantage.css', array( 'bootstrap', 'fontawesome' ), ADVANTAGE_VERSION);
	$child_pre = array( 'advantage' );
	// Load Scheme CSS
	if ( ! empty( $advantage_options['schemecss'] ) ) {
		wp_enqueue_style('advantage-scheme', $advantage_options['schemecss'], $child_pre, ADVANTAGE_VERSION );
		$child_pre[] = 'advantage-scheme';		
	}
	//Load child theme's style.css
    if ( $theme_uri != get_stylesheet_directory_uri() )
		wp_enqueue_style('advantage-child', get_stylesheet_uri(), $child_pre, ADVANTAGE_VERSION );

	// Page Template specific
	if ( is_page_template( 'pages/portfolio.php' ) ) {
		wp_enqueue_script( 'infinite-scroll' , $theme_uri . '/js/jquery.infinitescroll.min.js', array( 'jquery-masonry' ), '2.0', true );	
		$advantage_dep[] = 'infinite-scroll';
	}		
	//Scripts
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );	
	wp_enqueue_script( 'modernizr' , $theme_uri . '/js/modernizr.custom.js', null );
	wp_enqueue_script( 'bootstrap' , $theme_uri . '/js/bootstrap.min.js', array( 'jquery'), '2.3.1', true );
	wp_enqueue_script( 'advantage' , $theme_uri . '/js/advantage.js', array( 'bootstrap'), ADVANTAGE_VERSION, true );
}
if ( ! is_admin() )
	add_action( 'wp_enqueue_scripts', 'advantage_scripts_method' ); 

require( get_template_directory() . '/inc/hooks.php' );
require( get_template_directory() . '/inc/lib-foundation.php' );
require( get_template_directory() . '/inc/lib-general.php' );
require( get_template_directory() . '/inc/lib-functions.php' );
require( get_template_directory() . '/inc/lib-content.php' );
require( get_template_directory() . '/inc/widgets.php' );
require( get_template_directory() . '/scheme/scheme.php' );
if ( is_admin() ) {
	require( get_template_directory() . '/inc/lib-admin.php' );
	require( get_template_directory() . '/inc/theme-options.php' );
}

$advantage_options = advantage_get_options(); //Global Theme Options
