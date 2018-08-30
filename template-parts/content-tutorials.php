<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package flauntsites-2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php

		if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :

				?>

		<div class="entry-meta">

				<?php flauntsites2017_posted_on(); ?>

		</div><!-- .entry-meta -->

			<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'flauntsites2017' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flauntsites2017' ),
				'after'  => '</div>',
			) );

			?>

	</div><!-- .entry-content -->


	<div class="vid-tut-col">

		<?php
			// get iframe HTML.
			$iframe = get_field( 'fs_video_url' );


			// use preg_match to find iframe src.
			preg_match( '/src="(.+?)"/', $iframe, $matches );
			$src = $matches[1];


			// Add extra params to iframe src.
			$params = array(
				'controls'  => 1,
				'hd'        => 1,
				'autohide'  => 1,
				'rel'       => 0,
			);

			$new_src = add_query_arg( $params, $src );

			$iframe = str_replace( $src, $new_src, $iframe );


			// Add extra attributes to iframe html.
			$attributes = 'frameborder="0"';

			$iframe = str_replace( '></iframe>', ' ' . $attributes . '></iframe>', $iframe );


			// Echo $iframe.
			echo $iframe;

			?>

	</div>

	<footer class="entry-footer">
		<?php flauntsites2017_entry_footer(); ?>
	</footer><!-- .entry-footer -->


</article><!-- #post-## -->
