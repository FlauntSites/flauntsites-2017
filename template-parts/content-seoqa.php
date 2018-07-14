<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package flauntsites-2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> href="<?php the_permalink( ); ?>">
	
	<?php if( !is_single() ) {

		the_post_thumbnail( 'thumbnail', array( 'class' => 'archive-thumb' ) );

	}; ?>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php flauntsites2017_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_single() ) : { ?>
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

		<footer class="entry-footer">
			<?php flauntsites2017_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"@type": "Question",
				"dateCreated": "",
				"text": "<?php the_title(); ?>",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "<?php the_content(); ?>"
					}
				}
			}
		</script>
	<?php } else: { ?>

		<footer class="entry-footer">
			<div>
				<p>Did this help you?</p>
			</div>
		<?php flauntsites2017_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	<?php } ?>
	<?php endif; ?>

</article><!-- #post-## -->