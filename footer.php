<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flauntsites-2017
 */

?>


		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="footer-identity">
				<a href="<?php echo home_url( '/' ); ?>" title="Web design, Hosting and SEO for Professional Photographers" >
					<img src="https://flauntsites.local/wp-content/uploads/2017/10/flauntsiteslogo.svg" />
				</a>
				<p>Photography Websites, Simplified</p>
			</div>
			
			<div class="footer-widgets">
				<div class="widget" id="widget-1"> 

					<?php if ( is_active_sidebar( 'footer_col_1' ) ) : ?>

							<?php dynamic_sidebar( 'footer_col_1' ); ?>

					<?php endif; ?>

				</div>

				<div class="widget" id="widget-2"> 

					<?php if ( is_active_sidebar( 'footer_col_2' ) ) : ?>

							<?php dynamic_sidebar( 'footer_col_2' ); ?>

					<?php endif; ?>

				</div>

				<div class="widget" id="widget-3"> 

					<?php if ( is_active_sidebar( 'footer_col_3' ) ) : ?>

							<?php dynamic_sidebar( 'footer_col_3' ); ?>

					<?php endif; ?>

				</div>

				<div class="widget" id="widget-4"> 

					<?php if ( is_active_sidebar( 'footer_col_4' ) ) : ?>

							<?php dynamic_sidebar( 'footer_col_4' ); ?>

					<?php endif; ?>

				</div>
			</div>

		</footer><!-- #colophon -->

		<div class="site-info">

			<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
					<?php if ( ! is_admin() ) : ?>
					<a href="/privacy-policy" class="privacy">Privacy Policy</a>
					<?php endif; ?>
			</p>

			<p class="site-credit">Home grown in sunny San Diego, CA</p>

		</div><!-- .site-info -->
	</div><!-- #page -->
	<a class="chat-message" href="#" >Have any questions? We're happy to help.</a>

	<?php wp_footer(); ?>

	</body>

</html>
