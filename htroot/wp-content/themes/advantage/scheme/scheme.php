<?php
/**
 * Add scheme related options
 *
 * @package advantage
 * @since advantage 1.2.6
 */
if ( ! defined('ABSPATH') ) exit;

function advantage_scheme_options( $scheme = NULL ) {
	$theme_uri = get_template_directory_uri();
	$scheme = array(
	'0' 		=>	array( 'key' => '0',
				   		'label' => __('Default','advantage'),
						'css' => '',
						'demoimg' => '',
						'options' => array(),
				),					
	);
	return apply_filters( 'advantage_colorscheme_array', $scheme );
}
?>