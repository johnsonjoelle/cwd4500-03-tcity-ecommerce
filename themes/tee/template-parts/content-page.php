<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salted_Tee
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() || is_product() ) : ?>
		<nav id="tee_woocommerce_nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-store',
					'menu_id'        => 'store-menu',
				)
			);
			?>
		</nav>
	<?php endif; ?>
	<header class="entry-header <?php if( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) { ?> alignwide <?php } ?> ">
		<?php 
		if ( ! is_shop() ) : 
			the_title( '<h1 class="entry-title">', '</h1>' );
		else : ?>
			<h1 class="entry-title">Choose a T. Style</h1>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php tee_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tee' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'tee' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
