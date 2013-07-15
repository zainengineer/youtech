<?php
/**
 * @package advantage
 * @since advantage 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 9]><html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
  <header id="masthead" class="site-header clearfix">
	<div class="row-fluid">	
		<?php advantage_branding(); ?>
    </div>
  </header>
<?php 
	global $advantage_options;
	
	if ( ! is_page_template( 'pages/featured.php' )
		&& ! ( is_home() && 1 == $advantage_options['homepage'] ) ) {
		advantage_nav_menu();
?>
<div id="main">
<?php advantage_title_bar(); ?>
	<div class="container-fluid content-area">
	<div class="row-fluid">
<?php
	}

