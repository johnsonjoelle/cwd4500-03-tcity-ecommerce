<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salted_Tee
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php tee_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
		if ( ! is_singular( 'product' ) ) {
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title tee-excerpt-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		}

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				tee_posted_by();
				tee_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="tee-excerpt-content">
		<?php
		the_excerpt();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tee' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .tee-excerpt-content -->

	<footer class="tee-excerpt-footer">
		<?php tee_entry_footer(); ?>
	</footer><!-- .tee-excerpt-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
