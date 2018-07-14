<?php
/**
 * The template for displaying all single Themes
 *
 * @package flauntsites-2017
 */

get_header(); ?>

	<div class="content">

		<?php while ( have_posts() ) : the_post(); ?>

				<div class="theme-grid">

					<div class="theme-image left">
						<?php the_post_thumbnail( 'large' ); ?>				
					</div>
					
					<div class="theme-content white right">

						<header>
							<h1><?php the_title(); ?><a href="#" class="globe"><?php require( 'images/globe.svg' ); ?> </a></h1>

							<?php if ( get_field('photos_provided_by' ) ) { ?>
								<span class="thanks">Many thanks to <a href="<?php the_field( 'provided_by_link' ); ?>"><?php the_field('photos_provided_by'); ?></a> for the photography.</span>
							<?php } ?>

						</header>

						<?php the_content( ); ?>

					</div>

				</div>

		<?php endwhile; ?>

	</div><!-- #primary -->
	<div class="surf-break-modal">
		
	</div>

<?php get_footer();
