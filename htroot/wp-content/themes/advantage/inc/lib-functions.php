<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Frontend related functions
 *
 * @package advantage
 * @since advantage 1.0
 */
if ( ! function_exists( 'advantage_get_options' ) ) : 
function advantage_get_options() {
	$options = wp_parse_args( get_option( 'advantage_theme_options' ), advantage_default_theme_options() );
	return $options;
}
endif;

function advantage_default_theme_options() {
	$defaults = array(
		'currenttab' => 0,	
		'homepage' => 2,
		'fp_option' => 1,
		'fp_category' => 0,
		'fp_effect' => 'slide',
		'gridwidth' => 1080,
		'content' => 8,
		'sidebar1' => 2,
		'sidebar2' => 2,
		'sidebarpos' => 1,
		'sidebarresp' => 0,
		'respbp' => 960,
		'column_home1' => 4,
		'column_home2' => 4,
		'column_home3' => 4,
		'column_home4' => 0,
		'column_home5' => 0,
		'column_footer1' => 4,
		'column_footer2' => 4,
		'column_footer3' => 4,
		'column_footer4' => 0,
		'advantage_inline_css' => '',
		'advantage_scheme_css' => '',
		'url_vimeo' => '',
		'url_youtube' => '',
		'url_facebook' => '',
		'url_linkedin' => '',
		'url_twitter' => '',
		'url_gplus' => '',
		'url_flickr' => '',
		'url_instagram' => '',
		'url_pinterest' => '',
		'url_stumbleupon' => '',
		'url_aboutme' => '',
		'url_rss' => get_bloginfo( 'rss2_url' ),	
		'bodyfont' => 0,
		'sitetitlefont' => 900,
		'sitedescfont' => 0,
		'entrytitlefont' => 0,
		'headingfont' => 0,
		'widgettitlefont' => 0,
		'sidebarfont' => 0,
		'footerfont' => 0,
		'mainmenufont' => 0,
		'otherfont1' => '',
		'otherfont2' => '',
		'otherfont3' => '',
		'otherfont4' => '',
		'colorscheme' => '0',
		'schemecss' => '',
		'headerbg' => '',
		'titlebarbg' => '',
		'contentbg' => '',
		'footerbg' => '',
		'headline' => get_bloginfo( 'name', 'display' ),		
		'tagline' => get_bloginfo( 'description' ),		
	);
	return apply_filters( 'advantage_default_theme_options', $defaults );
}

function advantage_custom_css() {
	global $advantage_options, $advantage_fonts;
	// Inpage CSS
	echo '<!-- Custom CSS Styles -->' . "\n";
    echo '<style type="text/css" media="screen">' . "\n";
    if ( ! empty($advantage_options['advantage_scheme_css'] ) )
		echo $advantage_options['advantage_scheme_css'] . "\n";
    if ( ! empty($advantage_options['advantage_inline_css'] ) )
		echo $advantage_options['advantage_inline_css'] . "\n";
	echo '</style>' . "\n";
}
add_action( 'wp_head', 'advantage_custom_css' );

/** 
* Add span to category/archive count
*/
function advantage_category_count_span($links) {
  $links = str_replace( '</a> (', '</a> <span>(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'wp_list_categories', 'advantage_category_count_span' );

function advantage_archive_count_span($links) {
  $links = str_replace( '</a>&nbsp;(', '</a> <span>(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'get_archives_link', 'advantage_archive_count_span' );

function advantage_social_links() {
	$social_links = array(
		'facebook' => array(
			'name'  => 'url_facebook',
			'label' => __( 'Facebook', 'advantage' ),
		),
		'linkedin' => array(
			'name'  => 'url_linkedin',
			'label' => __( 'Linkedin', 'advantage' ),
		),		
		'twitter' => array(
			'name'  => 'url_twitter',
			'label' => __( 'Twitter', 'advantage' ),
		),
		'gplus' => array(
			'name'  => 'url_gplus',
			'label' => __( 'Google+', 'advantage' ),
		),
		'youtube' => array(
			'name'  => 'url_youtube',
			'label' => __( 'YouTube', 'advantage' ),
		),
		'vimeo' => array(
			'name'  => 'url_vimeo',
			'label' => __( 'Vimeo', 'advantage' ),
		),
		'flickr' => array(
			'name'  => 'url_flickr',
			'label' => __( 'Flickr', 'advantage' ),
		),
		'instagram' => array(
			'name'  => 'url_instagram',
			'label' => __( 'Instagram', 'advantage' ),
		),
		'pinterest' => array(
			'name'  => 'url_pinterest',
			'label' => __( 'Pinterest', 'advantage' ),
		),
		'aboutme' => array(
			'name'  => 'url_aboutme',
			'label' => __( 'About Me', 'advantage' ),
		),
		'stumbleupon' => array(
			'name'  => 'url_stumbleupon',
			'label' => __( 'Stumbleupon', 'advantage' ),
		),
		'rss' => array(
			'name'  => 'url_rss',
			'label' => __( 'RSS Feed', 'advantage' ),
		),
	);
	return apply_filters( 'advantage_social_links', $social_links );
}

if ( ! function_exists( 'advantage_thumbnail_size' ) ) : 
function advantage_thumbnail_size( $option, $x = 96, $y = 96 ) {

	if ( empty( $option ) )
		return 'thumbnail';
	elseif ( 'custom' == $option ) {
		if (($x > 0) && ($y > 0) )
			return array( $x, $y);
		else
			return 'thumbnail';		
	}
	else 
		return $option;
}
endif;

function advantage_fonts_array() {
	global $advantage_options;
	$fonts = array(
	'0' => array( 'key' => '0',
				'label' => 'Default',
				'url'  => '',
				'family' => "'Helvetica Neue', Helvetica, Arial, sans-serif",
				'type' => 'Sans' ),
//Sans
	'100' => array(	'key' => '100',
				'label' => 'Arial',
				'url'  => '',
				'family' => "Arial, Helvetica, sans-serif",
				'type' => 'Sans' ),
	'101' => array(	'key' => '101',
				'label' => 'Arial Black',
				'url'  => '',
				'family' => "Arial Black, Gadget, sans-serif",
				'type' => 'Sans' ),
	'102' => array(	'key' => '102',
				'label' => 'Impact',
				'url'  => '',
				'family' => "Impact, Charcoal, sans-serif",
				'type' => 'Sans' ),		
	'103' => array(	'key' => '103',
				'label' => 'Lucida Sans',
				'url'  => '',
				'family' => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
				'type' => 'Sans' ),		
	'104' => array(	'key' => '104',
				'label' => 'Tahoma',
				'url'  => '',
				'family' => "Tahoma, Geneva, sans-serif",
				'type' => 'Sans',
		),
	'105' => array(	'key' => '105',
				'label' => 'Trebuchet MS',
				'url'  => '',
				'family' => "'Trebuchet MS', sans-serif",
				'type' => 'Sans' ),
	'106' => array(	'key' => '106',
				'label' => 'Verdana',
				'url'  => '',
				'family' => "Verdana, Geneva, sans-serif",
				'type' => 'Sans' ),
	'107' => array(	'key' => '107',
				'label' => 'MS Sans Serif',
				'url'  => '',
				'family' => "'MS Sans Serif', Geneva, sans-serif",
				'type' => 'Sans' ),		
//Sans Webs
	'200' => array(	'key' => '200',
				'label' => 'Open Sans',
				'url'  => '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic',
				'family' => "'Open Sans', sans-serif",
				'type' => 'Sans' ),
	'201' => array(	'key' => '201',
				'label' => 'Ubuntu',
				'url'  => '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,700italic,700',
				'family' => "'Ubuntu', sans-serif;",
				'type' => 'Sans' ),	
/* Other popular google font
    Myriad Pro, League Gothic, Cabin, Corbel, Museo Slab
    Bebas Neue, Lobster, Franchise, PT Serif
*/		
//Serif
	'400' => array(	'key' => '400',
				'label' => 'Georgia',
				'url'  => '',
				'family' => "Georgia, serif",
				'type' => 'Serif' ),
	'401' => array(	'key' => '401',
				'label' => 'Palatino',
				'url'  => '',
				'family' => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
				'type' => 'Serif' ),
	'402' => array(	'key' => '402',
				'label' => 'Times New Roman',
				'url'  => '',
				'family' => "'Times New Roman', Times, serif",
				'type' => 'Serif' ),	
	'403' => array(	'key' => '403',
				'label' => 'MS Serif',
				'url'  => '',
				'family' => "'MS Serif', 'New York', serif",
				'type' => 'Serif' ),		
//Serif Webfonts

//Monospae
	'600' => array(	'key' => '600',
				'label' => 'Courier New',
				'url'  => '',
				'family' => "'Courier New', monospace",
				'type' => 'Monospace' ),
	'601' => array(	'key' => '601',
				'label' => 'Lucida Console',
				'url'  => '',
				'family' => "'Lucida Console', Monaco, monospace",
				'type' => 'Monospace' ),
//Monospae Webfonts

//Cursive
	'800' => array(	'key' => '800',
				'label' => 'Comic Sans MS',
				'url'  => '',
				'family' => "'Comic Sans MS', cursive",
				'type' => 'Cursive' ),
//Cursive Webfonts
	'900' => array(	'key' => '900',
				'label' => 'Berkshire Swash',
				'url'  => '//fonts.googleapis.com/css?family=Berkshire+Swash',
				'family' => "'Berkshire Swash', cursive",
				'type' => 'Cursive',
		),
	'901' => array(	'key' => '901',
				'label' => 'Lobster',
				'url'  => '//fonts.googleapis.com/css?family=Lobster:400,400italic,700,700italic',
				'family' => "'Lobster', cursive",
				'type' => 'Cursive' ),
//Cursive Webfonts
	);
//User defined google fonts
	if ( ! empty( $advantage_options['otherfont1'] ) ) {
		$fonts['1001'] = 	array(	'key' => '1001',
				'label' => $advantage_options['otherfont1'],
				'url'  => advantage_google_font_url( $advantage_options['otherfont1']),
				'family' => "'" . $advantage_options['otherfont1'] ."', Helvetica, Arial, sans-serif",
				'type' => 'Others' );
	}
	else {
		$fonts['1001'] = 	array(	'key' => '1001',
				'label' => __( 'Other Font 1', 'advantage' ),
				'url'  => '',
				'family' => "Helvetica, Arial, sans-serif",
				'type' => 'Others' );		
	}	
	if ( ! empty( $advantage_options['otherfont2'] ) ) {
		$fonts['1002'] = 	array(	'key' => '1002',
				'label' => $advantage_options['otherfont2'],
				'url'  => advantage_google_font_url( $advantage_options['otherfont2']),
				'family' => "'" . $advantage_options['otherfont2'] ."', Helvetica, Arial, sans-serif",
				'type' => 'Others' );
	}
	else {
		$fonts['1002'] = 	array(	'key' => '1002',
				'label' => __( 'Other Font 2', 'advantage' ),
				'url'  => '',
				'family' => "Helvetica, Arial, sans-serif",
				'type' => 'Others' );		
	}	
	if ( ! empty( $advantage_options['otherfont3'] ) ) {
		$fonts['1003'] = 	array(	'key' => '1003',
				'label' => $advantage_options['otherfont3'],
				'url'  => advantage_google_font_url( $advantage_options['otherfont3']),
				'family' => "'" . $advantage_options['otherfont3'] ."', Helvetica, Arial, sans-serif",
				'type' => 'Others' );
	}
	else {
		$fonts['1003'] = 	array(	'key' => '1003',
				'label' => __( 'Other Font 3', 'advantage' ),
				'url'  => '',
				'family' => "Helvetica, Arial, sans-serif",
				'type' => 'Others' );		
	}	
	if ( ! empty( $advantage_options['otherfont4'] ) ) {
		$fonts['1004'] = 	array(	'key' => '1004',
				'label' => $advantage_options['otherfont4'],
				'url'  => advantage_google_font_url( $advantage_options['otherfont4']),
				'family' => "'" . $advantage_options['otherfont4'] ."', Helvetica, Arial, sans-serif",
				'type' => 'Others' );
	}	
	else {
		$fonts['1004'] = 	array(	'key' => '1004',
				'label' => __( 'Other Font 4', 'advantage' ),
				'url'  => '',
				'family' => "Helvetica, Arial, sans-serif",
				'type' => 'Others' );		
	}	
	return apply_filters( 'advantage_fonts_array', $fonts );	
}

if ( ! function_exists( 'advantage_google_font_url' ) ) :
// Change in child theme if other font variants are desired.
function advantage_google_font_url( $name ) {
	return '//fonts.googleapis.com/css?family=' . str_replace(' ', '+', $name) . ':400,400italic,700italic,700';
}
endif;