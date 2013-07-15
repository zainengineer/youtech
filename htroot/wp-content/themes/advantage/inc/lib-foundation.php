<?php
/**
 * Functions for Bootstrap Framework
 *
 * @package advantage
 * @since 1.0
 */
class advantage_bootstrap_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth ) {
		$indent = str_repeat( "\t", $depth );
		$output	.= "\n$indent<ul class=\"dropdown-menu\">\n";	
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		if (strcasecmp($item->title, 'divider')) {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
//			$classes[] = ($item->current && 0 == $depth) ? 'active' : '';
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children && 0 < $depth )
				$class_names .= ' dropdown-submenu';
			elseif( $args->has_children && 0 == $depth )
				$class_names .= ' dropdown';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
//$attributes .= ($args->has_children) ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ($args->has_children && $depth == 0) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		} else {
			$output .= $indent . '<li class="divider">';
		}
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		elseif ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
		$id = $element->$id_field;

// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ) {
				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth),
										$args);
					call_user_func_array( array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}

function advantage_nav_fb() {
	echo '<ul class="nav">';
	wp_list_pages( array(
			'echo' => 1,
			'title_li'     => '',
			'sort_column' => 'menu_order, post_title',
			'walker' => new advantage_page_walker(),
			'post_type' => 'page',
			'post_status' => 'publish'
	) );
	echo '</ul>';
}

class advantage_page_walker extends Walker_Page {
	
	function start_el( &$output, $page, $depth, $args, $current_page ) {
		$item_html = '';
		parent::start_el( $item_html, $page, $depth, $args, $current_page );
		$css_class = array( 'page_item', 'page-item-'.$page->ID );
		if ( $args['has_children'] && 0 == $depth ) {
			$css_class[] = 'dropdown';
		} elseif ( $args['has_children'] && 0 < $depth )
			$css_class[] = 'dropdown-submenu';

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
		if ( $args['has_children'] && 0 == $depth ) {
		$item_html = '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . apply_filters( 'the_title', $page->post_title, $page->ID ) . '<span class="caret dropdown-toggle" data-toggle="dropdown"></span></a>';			
		}
		else
		$item_html = '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . apply_filters( 'the_title', $page->post_title, $page->ID ) . '</a>';
		$output .= $item_html;
	}
 
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}
}

if ( ! function_exists( 'advantage_content_class' ) ) :
function advantage_content_class() {
    global $advantage_options;
	$class = "span" . $advantage_options['content'] . ' ' ;
	if ( 2 == $advantage_options['sidebarpos'] && ( $advantage_options['sidebar1'] > 0 || $advantage_options['sidebar2'] > 0 ) ) {
		if ( ( $advantage_options['content'] + $advantage_options['sidebar1'] + $advantage_options['sidebar2'] ) > 12 ) {
			if ($advantage_options['sidebar1'] > $advantage_options['sidebar2'])
				$push_col = $advantage_options['sidebar1']; 
			else
				$push_col = $advantage_options['sidebar2'];
		}
		else {
			$push_col = $advantage_options['sidebar1'] + $advantage_options['sidebar2']; 			
		}
		$class = $class . "push" . $push_col . ' ';
	}
	elseif ( 3 == $advantage_options['sidebarpos'] && $advantage_options['sidebar1'] > 0 ) {
		$push_col = $advantage_options['sidebar1']; 
		$class = $class . "push" . $push_col . ' ';		
	}
	return $class;
}
endif;

if ( ! function_exists( 'advantage_grid_columns' ) ) :
function advantage_grid_columns( $col ) {
	return 'span' . $col;
}
endif; 

if ( ! function_exists( 'advantage_grid_full' ) ) :
function advantage_grid_full() {
	return "span12";
}
endif;
