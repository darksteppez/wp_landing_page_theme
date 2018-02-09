<?php
/**
 * swarm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package swarm
 */

if ( ! function_exists( 'swarm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function swarm_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on swarm, use a find and replace
	 * to change 'swarm' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'swarm', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'swarm' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'swarm_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'swarm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function swarm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swarm_content_width', 640 );
}
add_action( 'after_setup_theme', 'swarm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function swarm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'swarm' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'swarm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'swarm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function swarm_scripts() {

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '20170123' );

	wp_enqueue_style( 'swarm-style', get_template_directory_uri() . '/style.css', array('bootstrap-css'), '20170123' );

	wp_enqueue_style( 'swarm-compiled', get_template_directory_uri() . '/css/swarm.css', array('swarm-style'), '20170123' );

	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/js/slick/slick.css', array('swarm-style'), '1.6.0' );

	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_script( 'swarm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'swarm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '1.6.0', true );

	wp_enqueue_script( 'header-js', get_template_directory_uri() . '/js/header.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '20170123', true );

	/* google font */
	wp_enqueue_style( 'fjalla-font', 'https://fonts.googleapis.com/css?family=Fjalla+One', array() );

	/* newsletter sticky signup on home ONLY */
	if (is_front_page()) {
		wp_enqueue_script( 'newsletter-sticky-js', get_template_directory_uri() . '/js/home.js', array('jquery'), '20170206', true );
	}

	if (is_page('success')) {
		wp_enqueue_script( 'success-page-js', get_template_directory_uri() . '/js/success.js', array('jquery'), '20170209', true );	
	}

}
add_action( 'wp_enqueue_scripts', 'swarm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom post types
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Load shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';
