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

			<?php fsc_res_bg_img( 'hero_background_image' ); ?>
		
		</div>

		<div class="hero-cta up"> 

			<div class="cta-message">
				<h1><?php the_field( 'hero_header' ); ?></h1>
				<?php the_field( 'hero_text' ); ?>
			</div>
			<a href="/pricing" class="btn-open">Sign Up</a>
			<!-- <button class="btn-open" id="hero-video">Find Out More</button> -->
			<!-- <a class="btn-solid" href="<?php the_field( 'cta_button_2_link' ); ?>"><?php the_field( 'cta_button_2_text' ); ?></a> -->
		</div>	

		<div class="scroll-button"></div>
		<?php photo_credit( 'section1_photo_credit', 'section1_photo_credit_url'); ?>
	</section>



	<section id="what-we-do" >

		<header class="white neutral">
			<h2><?php the_field( 'section2_title' ); ?></h2>
			<?php the_field( 'section2_text' ); ?>
		</header>

		<div class="wwd-grid">
			<div>
				<img src="https://flauntsites.com/wp-content/uploads/2018/07/padang-padang-mockup.jpg">
			</div>	
			<div class="wwd-matrix">
				<a href="#speed">
					<?php require( 'images/speedometer.svg' ); ?>
					<p>Lightning Fast hosting</p>
				</a>
				<a href="#seo">
					<?php require( 'images/seo.svg' ); ?>
					<p>Built in SEO</p>
				</a>
				<a href="#themes">
					<?php require( 'images/launch.svg' ); ?>
					<p>Stunning Themes</p>
				</a>
				<a href="#security">
					<?php require( 'images/security.svg' ); ?>
					<p>Ft Knox Level Security</p>
				</a>
			</div>
		</div>

		
	</section>
	
	
	<section id="themes">
		
		<div class="tint"></div>
		<div class="responsive-bg">
			<?php fsc_res_bg_img( 'themes_background_image' ); ?>
		</div>

		<header class="white neutral">
			<h2><?php the_field( 'themes_title' ); ?></h2>
			<?php the_field( 'themes_text' ); ?>
		</header>

		<?php get_template_part( 'theme-carousel' ); ?>
		<?php photo_credit( 'themes_photo_credit', 'themes_photo_credit_url'); ?>
	</section>
	

	<section id="who-we-serve">
		<header class="white neutral">
			<h2><?php the_field( 'who_title' ); ?></h2>
			<?php the_field( 'who_text' ); ?>
		</header>

		<div class="rain-div">
			<span class="horizontal-rain white">Architectural</span>
			<span class="horizontal-rain white">Aerial</span>
			<span class="horizontal-rain white">Fashion</span>
			<span class="horizontal-rain white">Fine-art</span>
			<span class="horizontal-rain white">Food</span>
			<span class="horizontal-rain white">Lifestyle</span>
			<span class="horizontal-rain white">Photojournalism</span>
			<span class="horizontal-rain white">Portrait</span>
			<span class="horizontal-rain white">Social documentary</span>
			<span class="horizontal-rain white">Stock</span>
			<span class="horizontal-rain white">Street</span>
			<span class="horizontal-rain white">Travel</span>
			<span class="horizontal-rain white">Wedding</span>
		</div class="rain-div">

	</section>


	<section id="seo">
		<div class="tint"></div>
		<div class="responsive-bg">
			<?php fsc_res_bg_img( 'seo_background_image' ); ?>
		</div>

		<header class="white neutral">
			<h2><?php the_field( 'seo_title' ); ?></h2>
			<?php the_field( 'seo_text' ); ?>
		</header>

		<div class="features">
			<div>
				<img src="https://flauntsites.com/wp-content/plugins/flaunt-sites-core/admin/images/support-screen.jpg" />
				<p>Easy to follow SEO Tutorials. Knowing is half the battle!</p>
			</div>
			<div>
				<?php require( 'images/seo-code.svg' ); ?>
				<p>Deep Technical SEO built into each theme.</p>
			</div>
			<div>
				<img src="https://flauntsites.com/wp-content/uploads/2018/06/yoast-logo-icon-512x512.png" />
				<p>Yoast SEO plugin installed and preconfigured.</p>
			</div>
		</div>

	<?php photo_credit( 'seo_photo_credit', 'seo_photo_credit_url'); ?>
	</section>

	<!-- <section id="seo-color">

		<header class="white neutral">
			<h2><?php the_field( 'seo_title' ); ?></h2>
			<?php the_field( 'seo_text' ); ?>
		</header>

	</section> -->

	<section id="speed"> 
		<div class="tint"></div>
		<div class="responsive-bg">
			<?php fsc_res_bg_img( 'speed_background_image' ); ?>
		</div>

		<header class="white neutral">
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
		
		<?php photo_credit( 'speed_photo_credit', 'speed_photo_credit_url'); ?>
	</section>


	<section id="price-breakdown">

		<header class="white neutral">
			<h2><?php the_field( 'pricing_breakdown_title' ); ?></h2>
			<?php the_field( 'pricing_breakdown_text' ); ?>				
		</header>

		<?php get_template_part( 'inc/pricing-breakdown' ); ?>

	</section>


	<section id="security">

		<div class="tint"></div>
		<div class="responsive-bg">
			<?php fsc_res_bg_img( 'security_background_image' ); ?>
		</div>

		<header class="white neutral">
			<h2><?php the_field( 'security_title' ); ?></h2>
			<?php the_field( 'security_text' ); ?>				
		</header>

		<div class="features">
			<div class="left">
				<?php require( 'images/006-browser.svg' ); ?>
				<p>Free SSL protects you and your clients.</p>
			</div>
			<div class="up">
				<?php require( 'images/027-database-2.svg' ); ?>
				<p>Daily backups, cause $#!* happens.</p>
			</div>
			<div class="right">
				<?php require( 'images/web-maintenance.svg' ); ?>
				<p>We keep everything up to date for you.</p>
			</div>
		</div>

	<?php photo_credit( 'security_photo_credit', 'security_photo_credit_url'); ?>
	</section>




	<section id="partners">

		<header class="white neutral">
			<h2><?php the_field( 'partner_title' ); ?></h2>
			<?php the_field( 'partner_text' ); ?>
		</header>

		<?php get_template_part( 'partners' ); ?>

	</section>

	<!-- <div class="cta-signup">

	</div> -->

	<?php get_footer(); ?>
