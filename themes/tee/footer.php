<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Salted_Tee
 */


$popular_args = array(
	'post_type' => array( 'tee_design' ),
	'post_status' => 'publish',
	'posts_per_page' => '4',
	'orderby' => 'comment-count'
);

?>

	<footer id="colophon" class="site-footer">
		<!-- 'popular' WP_Query only shows on specific woocommerce pages -->
		<?php if ( is_product() || is_page( array( 'cart', 'checkout' ) ) ) : ?>
		<section class="tee-entry-footer-wide">
			<div class="tee-popular-designs-header">
				<h2>Popular Designs</h2>
				<p?>Looking to grab and go? Check out these designs</p>
			</div>
			<div class="grid-x grid-margin-y grid-margin-x tee-popular-designs">
				<?php 
				$popular_query = new WP_Query( $popular_args );

				if ( $popular_query->have_posts() ) :
					while ( $popular_query->have_posts() ) :
						?> 
						<div class="cell small-12 medium-4 large-3 tee-popular-design"> 
							<?php
							$popular_query->the_post();
							the_post_thumbnail();
							the_title( '<h2>', '</h2>' );
							tee_designed_by();
							?> 
						</div> 
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</section>
		<?php endif; ?>
		<div class="tee-footer-top">
			<p><?php bloginfo( 'name' ); ?> &copy; Copyright 2022</p>
		</div>
		<div class="tee-footer-divider"></div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tee' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'tee' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: Salted Tea by %2$s.', 'tee' ), 'tee', '<a href="https://joellejohnson.com">Joelle Johnson</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
