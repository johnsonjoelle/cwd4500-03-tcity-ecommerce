<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the front-page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salted_Tee
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if( has_post_thumbnail() ) : ?>
			<section id="front-page-banner">
				<?php 
				the_post_thumbnail();
				?>
				<!-- feature image? -->
			</section>
		<?php
		endif;

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'front' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();