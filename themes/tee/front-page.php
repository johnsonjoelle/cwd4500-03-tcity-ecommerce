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
        <section>
            <!-- feature image? -->
        </section>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();