<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flauntsites-2017
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<script>
	var controller = new ScrollMagic.Controller();
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flauntsites2017' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="inner-header">

			<div class="identity">

				<a href="<?php echo home_url( '/' ); ?>" title="Web design, Hosting and SEO for Professional Photographers" >
					<!-- <img src="https://flauntsites.local/wp-content/uploads/2017/10/flauntsiteslogo.svg" /> -->
					<?php require('images/flauntsiteslogo.svg'); ?>
				</a>

			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><?php esc_html_e( 'Menu', 'flauntsites2017' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

		</div>

		<div class="stripes-container">
			<hr class="stripes" id="a">
			<hr class="stripes" id="b">
			<hr class="stripes" id="c">		
		</div>

	</header><!-- #masthead -->
	
	<div id="content" class="site-content">