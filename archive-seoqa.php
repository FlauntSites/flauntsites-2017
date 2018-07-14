<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package flauntsites-2017
 */

get_header(); ?>

	<div class="content">

			<header class="page-header">
				<h1 class="page-title">The Ultimate SEO For Photographers Q+A</h1> 
				<p>This is the Ultimate SEO Q+A for Photographers.</p>
				<p>Photographers tend to have a unique set of concerns in regards to SEO, and we hope that this will quickly become the place you turn to when you have those questions.</p>
			</header><!-- .page-header -->

			<section>

				<?php
				if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-seoqa', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</section>

	</div>

<?php

get_footer();
