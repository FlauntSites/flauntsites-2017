<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package flauntsites-2017
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main small-12 small-centered medium-11 columns" role="main">

		<?php
		while ( have_posts() ) : the_post();
						
				get_template_part( 'template-parts/content-tutorials', get_post_format() );

				fs_next_post_links();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
