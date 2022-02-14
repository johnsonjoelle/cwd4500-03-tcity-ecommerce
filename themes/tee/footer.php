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

?>

	<footer id="colophon" class="site-footer">
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
