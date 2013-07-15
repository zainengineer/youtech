<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * General Framework function
 *
 * @package advantage
 * @since 1.0
 */
function advantage_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );
	
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'advantage' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'advantage_wp_title', 10, 2 );

function advantage_thumbnail_array() {
	$sizes = array (
		array(	'key' => '',
				'name' => __( 'Thumbnail', 'advantage' ) ),
		array(	'key' => 'medium',
				'name' => __( 'Medium', 'advantage' ) ),
		array(	'key' => 'large',
				'name' => __( 'Large', 'advantage' ) ),
		array(	'key' => 'full',
				'name' => __( 'Full', 'advantage' ) ),
		array(	'key' => 'custom',
				'name' => __( 'Custom', 'advantage' ) ),
		array(	'key' => 'none',
				'name' => __( 'None', 'advantage' ) ),
	);
	global $_wp_additional_image_sizes;

	if ( isset( $_wp_additional_image_sizes ) )
		foreach( $_wp_additional_image_sizes as $name => $item) 
			$sizes[] = array( 'key' => $name, 'name' => $name );
	return apply_filters( 'advantage_thumbnail_array', $sizes );
}

function advantage_post_types() { 
	$args = array(
  		'public'   => true,
  		'_builtin' => false ); 
	$post_types = get_post_types( $args ); 
	$types = array( 
		array(	'key' => 'post',
				'name' => __( 'post', 'advantage' ) ),
		array(	'key' => 'page',
				'name' => __( 'page', 'advantage' ) ),
	);
	foreach ( $post_types as $post_type ) {
		$types[] = array( 'key' => $post_type, 'name' => $post_type );
	}
	return apply_filters( 'advantage_post_types', $types );
}

function advantage_gallery_image_ids( $content ) {
	$image_ids = array();
    preg_match_all( '/\[gallery.*.\]/' , $content, $matches);
	foreach ( $matches[0] as $match ) {
        $str = str_replace (" ", "&", trim ($match));
        $str = str_replace ('"', '', $str);
		$attrs = wp_parse_args( $str );
		if ( isset( $attrs['ids'] ) ) {
			$ids = explode( ',', $attrs['ids'] );	
			$image_ids = array_merge( $image_ids, $ids );	
		}
	}
	return $image_ids;
}

//Sorting array by key
function advantage_sort_array( &$array, $key ) {
    $sorter = array();
    $ret = array();
    reset( $array );
    foreach ( $array as $ii => $va ) {
        $sorter[ $ii ] = $va[ $key ];
    }
    asort( $sorter );
    foreach ( $sorter as $ii => $va ) {
        $ret[ $ii ] = $array[ $ii ];
    }
    $array = $ret;
}
/* Category Array */
function advantage_categories() {
	$category = get_categories();
	return apply_filters( 'advantage_categories', $category );
}	
/* Content Filter: Remove image from post*/
function advantage_remove_images( $content ) {
   $postOutput = preg_replace('/<img[^>]+./','', $content);
   return $postOutput;
}

function advantage_excerpt_filter( $content ) {
	return '<p>' . $content . '</p>';
}
remove_filter('the_excerpt', 'wpautop');
add_filter( 'the_excerpt', 'advantage_excerpt_filter' );
