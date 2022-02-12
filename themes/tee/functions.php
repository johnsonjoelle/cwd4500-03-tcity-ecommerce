<?php
/**
 * Salted Tee functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Salted_Tee
 */

if ( ! defined( 'TEE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TEE_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tee_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Salted Tee, use a find and replace
		* to change 'tee' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tee', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-primary' => esc_html__( 'Primary', 'tee' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'tee_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tee_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tee_content_width', 640 );
}
add_action( 'after_setup_theme', 'tee_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tee_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tee' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tee' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tee_widgets_init' );

if ( ! function_exists( 'tee_editor_styles' ) ) :
	/* Enqueue editor styles. */
	function tee_editor_styles() {
		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', tee_get_font_face_styles() );
	}
endif;
add_action( 'admin_init', 'tee_editor_styles' );

if ( ! function_exists( 'tee_get_font_face_styles' ) ) :

	/* Get font face styles. */
	function tee_get_font_face_styles() {
		return "
		@font-face{
			font-family: 'Chivo';
			font-weight: 300;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-Light.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 300;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-LightItalic.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-Regular.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 400;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-Italic.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-Bold.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 700;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-BoldItalic.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-Black.ttf' ) . "') format('ttf');
		}
		@font-face{
			font-family: 'Chivo';
			font-weight: 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Chivo-BlackItalic.ttf' ) . "') format('ttf');
		}
		";
	}
endif;

if ( ! function_exists( 'tee_preload_webfonts' ) ) :
	/** Preloads the main web font to improve performance. */
	function tee_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/Chivo-Regular.ttf' ) ); ?>" as="font" type="font/ttf" crossorigin>
		<?php
	}
endif;
add_action( 'wp_head', 'tee_preload_webfonts' );

/**
 * Enqueue scripts and styles.
 */
function tee_scripts() {

	// Foundations Version 6.7.4
	wp_enqueue_style(
		'foundation-style',
		get_template_directory_uri() . '/assets/css/vendor/foundation.min.css',
		array(),
		'6.7.4'
	);
	
	wp_enqueue_style(
		'tee-style',
		get_stylesheet_uri(),
		array(),
		TEE_VERSION
	);
	// Add styles inline.
	wp_add_inline_style( 'tee-style', tee_get_font_face_styles() );

	wp_enqueue_script(
		'what-input-script',
		get_template_directory_uri() . '/assets/js/vendor/what-input.js',
		array( 'jquery' ),
		'5.2.10',
		true
	);

	wp_enqueue_script(
		'foundation-script',
		get_template_directory_uri() . '/assets/js/vendor/foundation.min.js',
		array( 'jquery', 'what-input-script' ),
		'6.7.4',
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tee_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Block editor additions.
 */
require get_template_directory() . '/inc/block-editor.php';