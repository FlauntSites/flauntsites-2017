<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package flauntsites-2017
 */

get_header(); ?>

	<div class="content">

		<?php
		while ( have_posts() ) :

			the_post();

				get_template_part( 'template-parts/content-tutorials', get_post_format() );

				fs_next_post_links();

		endwhile; // End of the loop.
		?>

	</div><!-- .content -->

<?php
get_footer();
