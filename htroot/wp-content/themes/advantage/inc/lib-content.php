<?php
/**
 * Functions for displaying content
 *
 * @package advantage
 * @since 1.0
 */
if ( ! function_exists( 'advantage_logo_image' ) ) :
function advantage_logo_image( $header_image, $size = 'full' ) {
	$html = '';
//	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) {
		if( function_exists( 'get_custom_header' ) ) {
			$header_width = get_custom_header() -> width;
			$header_height = get_custom_header() -> height;
		}
		else {
			$header_width = HEADER_IMAGE_WIDTH;
			$header_height = HEADER_IMAGE_HEIGHT;				
		}
		if ( 'full' != $size ) {
			$ratio = $size / $header_height;
			$header_height = (int) $header_height * $ratio;
			$header_width = (int) $header_width  * $ratio;				 
		}
		$html = '<img src="' . esc_url( $header_image ) . '" width="';
		$html .= $header_width . '" height="' . $header_height;
		$html .= '" alt="' . get_bloginfo( 'name') . '" />';
	}	
	echo apply_filters( 'advantage_logo_image', $html );
}
endif;

if  ( ! function_exists( 'advantage_branding' ) ) :
function advantage_branding() {
?>
<div id="branding">
  <div class="container-fluid">
<?php
	advantage_header_branding(); //Action Hooks
	get_sidebar( 'header' );
	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<div id="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  	<?php advantage_logo_image( $header_image ) ?>
		  </a>
		</div>
<?php } else {?>
	<div class="site-title clearfix">
	  <h3 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
	  <h3 id="site-description"><?php bloginfo( 'description' ); ?></h3>
	</div>
<?php }
	get_sidebar( 'center' ); ?>
  </div>
</div>
<?php
}
endif;

if ( ! function_exists( 'advantage_nav_menu' ) ) :
function advantage_nav_menu() {
	global $advantage_options;
	
	advantage_header_before_navbar();	
?>
<div id="mainmenu" class="navbar navbar-inverse">
  <div class="container-fluid">
  	<div class="navbar-inner">
	  <nav id="section-menu" class="section-menu">	
        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo '<i class="icon-home"></i>'; ?></a>
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
		<div class="nav-collapse">
<?php		advantage_top_search_form();
			wp_nav_menu( array(
				'container' => false,
				'menu_class' => 'nav',
				'theme_location' => 'section-menu', 
				'fallback_cb' => 'advantage_nav_fb',
				'walker' => new advantage_bootstrap_walker()
			));
?>
		</div><?php //nav-collapse ?>
	</nav>
    </div><?php //nav-inner ?>
  </div><?php //container ?>
</div><?php //navbar ?>
<?php
}
endif;

if ( ! function_exists( 'advantage_top_search_form' ) ) :	
function advantage_top_search_form() {
?>
    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-search pull-right">
    	<input type="text" class="search-query" name="s" id="s1" placeholder="<?php esc_attr_e( 'Search', 'advantage' ); ?>">
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'advantage' ); ?>" />
    </form>
<?php
}
endif;
if ( ! function_exists( 'advantage_post_title' ) ) :
// Display Post Title
function advantage_post_title() {
	global $advantage_layout;
	if ( ! is_single()  ) {
		printf('<h2 class="entry-title"><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></h2>',
			get_permalink(),
			sprintf( esc_attr__( 'Permalink to %s', 'advantage' ), the_title_attribute( 'echo=0' ) ),
			get_the_title()	);
	}
	else {
/*		printf('<h1 class="entry-title">%1$s</h1>',
			get_the_title()	);	*/
	}
}
endif;


if ( ! function_exists( 'advantage_single_post_link' ) ) :
/* This function echo the link to single post view for the following:
- Aside Post
- Post without title
------------------------------------------------------------------ */
function advantage_single_post_link() {
	if ( ! is_single() ) {
		if ( has_post_format( 'aside' ) || has_post_format( 'quote' ) || '' == the_title_attribute( 'echo=0' ) ) { 
			printf ('<a class="single-post-link" href="%1$s" title="%1$s"><i class="icon-chevron-right"></i></a>',
				get_permalink(),
				get_the_title()	);
		} 
	}
}
endif;

if ( ! function_exists( 'advantage_display_post_thumbnail' ) ) :
// Display Large Post Thumbnail on top of the post
function advantage_display_post_thumbnail( $post_id ) {
	global $advantage_layout;
	if ( has_post_thumbnail() ) {
		if ( ! is_single() ) {
			printf ('<a href="%1$s" title="%2$s">', 
				get_permalink(),
				get_the_title()	);	
			the_post_thumbnail( 'large', array( 'class'	=> 'img-polaroid featured-image', 'title' => get_the_title() ) );
			echo '</a>';
		}
		else {
			if ( 2 == $advantage_layout )			
				the_post_thumbnail( 'full', array( 'class'	=> 'fullscreen-image' ) );	
			else
				the_post_thumbnail( 'large', array( 'class'	=> 'img-polaroid featured-image', 'title' => get_the_title() ) );	
		}
	}
}
endif;

if ( ! function_exists( 'advantage_title_bar' ) ) :	
function advantage_title_bar() { ?>
	<div id="title" class="titlebar">
<?php
	if ( ! is_home() || function_exists( 'bcn_display' ) ) {
?>
	  <div class="container-fluid">
<?php		advantage_page_title(); ?>
<?php	if ( function_exists( 'bcn_display' ) ) { ?>
		<div class="breadcrumbs">	
<?php        bcn_display(); ?>
		</div>
<?php 	} ?>
	  </div>	  
<?php } ?>
	</div>
<?php
}
endif;

if ( ! function_exists( 'advantage_page_title' ) ) :	
function advantage_page_title() {
	global $advantage_options, $post;
	if ( ! have_posts()) return;
	if ( is_single() ) {
		printf( '<h1>%1$s</h1>', get_the_title() );	
	} elseif ( is_page() ) {
		$pagetitle = get_post_meta( $post->ID, '_advantage_title', true );
		
		if ( empty( $pagetitle ) )
			printf( '<h1>%1$s</h1>', get_the_title() );
	} elseif ( is_search() ) { ?>
		<h1><?php printf( __( 'Search Results for: %s', 'advantage' ), '<span>' . get_search_query() . '</span>' ); ?></h1>	
<?php
	} elseif ( is_author() ) {
			the_post(); ?>
			<h1><?php printf( __( 'Author Archives: %s', 'advantage' ), '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>' ); ?></h1>
<?php		rewind_posts();		
		
	}
	elseif ( is_category() ) {
		$category_description = category_description();
		if ( empty( $category_description ) ) { ?>					
			<h1><?php printf( __( 'Category Archives: %s', 'advantage' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
<?php
		} else
			echo '<h1>'. $category_description .'</h1>';			
	}
	elseif ( is_tag() ) {
		$tag_description = tag_description();
		if ( empty( $tag_description ) ) { ?>					
			<h1><?php printf( __( 'Tag Archives: %s', 'advantage' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
<?php
		} else
			echo '<h1>'. $tag_description .'</h1>';			
	}
	elseif ( is_archive() ) {
		echo '<h1>';
		if ( is_day() ) 
			printf( __( 'Daily Archives: %s', 'advantage' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() )
			printf( __( 'Monthly Archives: %s', 'advantage' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'advantage' ) ) . '</span>' );
		elseif ( is_year() )
			printf( __( 'Yearly Archives: %s', 'advantage' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'advantage' ) ) . '</span>' );
		else
			the_title(); 
		echo '</h1>';	
	}
}
endif;

if ( ! function_exists( 'advantage_template_intro' ) ) :
function advantage_template_intro() {
	global $post, $advantage_options;
		
//	$pagetitle = get_post_meta( $post->ID, '_advantage_title', true );
	$content = get_the_content();
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	if ( ! empty($content)) {
?>
<article id="post-<?php the_ID(); ?>" class="template-intro clearfix <?php echo advantage_grid_full(); ?>">
<?php
		echo '<div class="entry-content clearfix">';
		echo $content;
		echo '</div>';			
?>
</article>
<?php
	}
}
endif;