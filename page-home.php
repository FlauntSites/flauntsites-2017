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


	<section id="hero"> 

		<div class="tint"></div>

		<div class="responsive-bg">

			<?php fsc_res_bg_img( 'section1_background_image' ); ?>
		
		</div>

		<div class="hero-cta">

			<div class="cta-message">
				<h1><?php the_field( 'hero_h1' ); ?></h1>
				<h2><?php the_field( 'hero_h2' ); ?></h2>
			</div>

			<button class="btn-open" id="hero-video">Find Out More</button>
			<a class="btn-solid" href="<?php the_field( 'cta_button_2_link' ); ?>"><?php the_field( 'cta_button_2_text' ); ?></a>

		</div>	

		<div class="scroll-button"></div>

	</section>



	<section id="what-we-do" >

		<header class="white">
			<h2><?php the_field( 'section2_title' ); ?></h2>
			<?php the_field( 'section2_text' ); ?>
		</header>

		<div class="wwd-grid">
			<div>
				<img src="wp-content/uploads/2017/10/default_DSC_0007-standard-base__1_.jpg">
			</div>	
			<div class="wwd-matrix">
				<div>
					<?php require( 'images/speedometer.svg' ); ?>
					<p>Lightning Fast hosting</p>
				</div>
				<div>
					<?php require( 'images/seo.svg' ); ?>
					<p>Built in SEO</p>
				</div>
				<div>
					<?php require( 'images/launch.svg' ); ?>
					<p>Stunning Themes</p>
				</div>
				<div>
					<?php require( 'images/security.svg' ); ?>
					<p>Ft Knox Level Security</p>
				</div>
			</div>
		</div>

		
	</section>
	
	
	<section id="themes">
		
		<div class="tint"></div>
		<div class="responsive-bg">
			<?php fsc_res_bg_img( 'section3_background_image' ); ?>
		</div>

		<header class="white">
			<h2><?php the_field( 'themes_title' ); ?></h2>
			<?php the_field( 'themes_text' ); ?>
		</header>

		<?php get_template_part( 'theme-carousel' ); ?>

	</section>
	

	<section id="seo">

		<header class="white">
			<h2><?php the_field( 'seo_title' ); ?></h2>
			<?php the_field( 'seo_text' ); ?>
		</header>

		<div class="features">
			<div>
				<img src="https://flauntsites.local/wp-content/plugins/flaunt-sites-core/admin/images/support-screen.jpg" />
				<p>Easy to follow SEO Tutorials. Knowing is half the battle!</p>
			</div>
			<div>
				<?php require( 'images/seo-code.svg' ); ?>
				<p>Deep Technical SEO built into each theme.</p>
			</div>
			<div>
				<img src="https://flauntsites.local/wp-content/uploads/2018/06/yoast-logo-icon-512x512.png" />
				<p>Yoast SEO plugin installed and preconfigured.</p>
			</div>
		</div>

	</section>

	<section id="speed"> 
		<div class="tint"></div>

		<div class="responsive-bg">

				<?php fsc_res_bg_img( 'section5_background_image' ); ?>
			
		</div>

		<header class="white">
			<h2><?php the_field( 'speed_title' ); ?></h2>
			<?php the_field( 'speed_text' ); ?>		
		</header>

		<div class="flash-master-of-the-universe">
			<p>Flaunt Sites</p>
			<div class="empty" id="competitor-speed-one"><p>0</p></div>

			<p>Imagely</p>
			<div class="empty" id="competitor-speed-two"><p>0</p></div>

			<p>Squarespace</p>
			<div class="empty" id="competitor-speed-three"><p>0</p></div>
			
			<p>Flothemes</p>
			<div class="empty" id="competitor-speed-four"><p>0</p></div>

			<p>Prophoto</p>
			<div class="empty" id="competitor-speed-five"><p>0</p></div>

		</div>
		

	</section>


	<section id="security-support">

		<header class="white">
			<h2><?php the_field( 'security_title' ); ?></h2>
			<?php the_field( 'security_text' ); ?>				
		</header>

		<div class="features">
			<div>
				<?php require( 'images/006-browser.svg' ); ?>
				<p>Free SSL protects you and your clients.</p>
			</div>
			<div>
				<?php require( 'images/027-database-2.svg' ); ?>
				<p>Daily backups, cause $#!* happens.</p>
			</div>
			<div>
				<?php require( 'images/web-maintenance.svg' ); ?>
				<p>We keep everything up to date for you.</p>
			</div>
		</div>


	</section>


	<section id="partners">

		<header class="white">
			<h2><?php the_field( 'partner_title' ); ?></h2>
			<?php the_field( 'partner_text' ); ?>
		</header>

		<?php get_template_part( 'partners' ); ?>

	</section>


	<?php get_footer(); ?>
