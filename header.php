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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flauntsites2017' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="identity">
			<h1 class="orange">Pro Sites <span class="by">by</span></h1>
			<a class="logo" href="https://flauntyoursite.com" title="Web design, Hosting and SEO for Professional Photographers">
				<img src="https://flauntyoursite.com/flaunt-logo.svg" alt="Flaunt Sites" />
			</a>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
