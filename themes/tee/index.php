<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salted_Tee
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :
			// Check if page is blog page
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			if ( !is_front_page() && is_home() ) {
				?>
				<section class="tee-blog-post">
					<?php
					while ( have_posts() ) :
						the_post();
						if ( is_sticky() ) :
						?>
							<section class="entry-content">
								<div class="tee-featured-post">
									<h2>Featured Post</h2>
									<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
								</div>
							</section>
						<?php
						endif;
					endwhile; ?>
					<section class="entry-content">
						<div class="tee-posts-list">
							<h2>Recent Posts</h2>
						<?php
							while ( have_posts() ) :
								the_post();
								if ( !is_sticky() ) :
									get_template_part( 'template-parts/content', 'excerpt' ); 
								endif;
							endwhile;
						?>
						</div>
					</section>
				</section> <?php
			} else {

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					if ( is_blog() ) :
						get_template_part( 'template-parts/content', 'excerpt' );
					else :
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );
					endif;

				endwhile;
			}

			the_posts_navigation();
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
