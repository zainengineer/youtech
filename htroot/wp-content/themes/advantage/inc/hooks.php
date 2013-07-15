<?php
if ( ! defined( 'ABSPATH' )) exit;
/**
 * @package advantage
 * @since advantage 1.0
*/

function advantage_header_branding() {
	do_action( 'advantage_header_branding' );
}

function advantage_header_before_navbar() {
	do_action( 'advantage_header_before_navbar' );	
}
/**
 * WooCommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'advantage_woocommerce_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'advantage_woocommerce_content_wrapper_end', 10);

function advantage_woocommerce_content_wrapper() {
  echo '<div id="content" class="' . advantage_content_class() . '">';
}
 
function advantage_woocommerce_content_wrapper_end() {
  echo '</div><!-- end of #content -->';
}

/**
 * Jigoshop Support
 */
remove_action( 'jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10 );
remove_action( 'jigoshop_after_main_content', 'jigoshop_output_content_wrapper_end', 10 );

add_action( 'jigoshop_before_main_content', 'advantage_jigoshop_content_wrapper', 10 );
add_action( 'jigoshop_after_main_content', 'advantage_jigoshop_content_wrapper_end', 10 );

function advantage_jigoshop_content_wrapper() {
  echo '<div id="content" class="' . advantage_cotent_class() . '">';
}
 
function advantage_jigoshop_content_wrapper_end() {
  echo '</div><!-- end of #content -->';
}
?>