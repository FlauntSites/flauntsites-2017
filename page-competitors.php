<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package flauntsites-2017
 */

get_header(); ?>


	<div class="content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="competitor-grid">

				<?php competitor_columns( 'features' ); ?>
				<?php competitor_columns( 'flaunt-sites' ); ?>
				<?php competitor_columns( '' ); ?>

			</div>
		</article>
	</div>


<?php get_footer(); ?>