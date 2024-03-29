<?php

/**
 * simublog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Simu Blog
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.6.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simu_blog_setup()
{
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on simu-blog, use a find and replace
	 * to change 'simu-blog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('simu-blog', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary', 'simu-blog'),

		)
	);

	/**
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
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 140,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'simu_blog_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simu_blog_content_width()
{
	$GLOBALS['content_width'] = apply_filters('simu_blog_content_width', 1040);
}
add_action('after_setup_theme', 'simu_blog_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function simu_blog_scripts()
{
	wp_enqueue_style('simu-blog-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('simu-blog-google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
	wp_enqueue_style('simu-blog-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('simu-blog-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
	wp_enqueue_style('simu-blog-default', get_template_directory_uri() . '/assets/css/default.css');
	wp_enqueue_style('simu-blog-main-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('simu-blog-custom-style', get_template_directory_uri() . '/assets/css/custom.css');


	wp_enqueue_script('simu-blog-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true);
	wp_enqueue_script('simu-blog-skip-link-focus', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true);
	wp_enqueue_script('simu-blog-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', true);
	wp_enqueue_script('simu-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'simu_blog_scripts');



/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/hook/hook.php';


/**
 * Latest Post widget.
 */
require get_template_directory() . '/inc/widget/class-simublog-latest-post.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-config.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * TGM plugin activation
 */
require get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Theme required plugin
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
