<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Simu blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function simublog_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'simublog_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function simublog_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'simublog_pingback_header');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function simublog_skip_link_focus_fix()
{
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
			.addEventListener("hashchange", function() {
				var t, e = location.hash.substring(1);
				/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i
					.test(t.tagName) || (t.tabIndex = -1), t.focus())
			}, !1);
	</script>
<?php
}
add_action('wp_print_footer_scripts', 'simublog_skip_link_focus_fix');

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function simublog_skip_link()
{
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . esc_html('Skip to the content', 'simublog') . '</a>';
}

add_action('wp_body_open', 'simublog_skip_link', 5);



if (!function_exists('simublog_primary_navigation_fallback')) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function simublog_primary_navigation_fallback()
	{

		echo '<ul>';
		echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'simu-blog') . '</a></li>';
		wp_list_pages(array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
		));
		echo '</ul>';
	}

endif;


/** 
Site Logo  
 **/
function simublog_site_logo($args = array(), $echo = true)
{
	$logo       = get_custom_logo();
	$site_title = get_bloginfo('name');
	$contents   = '';
	$classname  = '';

	$defaults = array(
		'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'  => 'site-logo',
		'title'       => '<a href="%1$s">%2$s</a>',
		'title_class' => 'site-title',
		'home_wrap'   => '<h2 class="%1$s">%2$s</h2>',
		'single_wrap' => '<h2 class="%1$s">%2$s</h2>',
		'condition'   => (is_front_page() || is_home()) && !is_page(),
	);

	$args = wp_parse_args($args, $defaults);

	/**
	 * Filters the arguments for `simublog_site_logo()`.
	 *
	 * @param array  $args     Parsed arguments.
	 * @param array  $defaults Function's default arguments.
	 */
	$args = apply_filters('simublog_site_logo_args', $args, $defaults);

	if (has_custom_logo()) {
		$contents  = sprintf($args['logo'], $logo, esc_html($site_title));
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf($args['title'], esc_url(get_home_url(null, '/')), esc_html($site_title));
		$classname = $args['title_class'];
	}

	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html = sprintf($args[$wrap], $classname, $contents);

	/**
	 * Filters the arguments for `simublog_site_logo()`.
	 *
	 * @param string $html      Compiled html based on our arguments.
	 * @param array  $args      Parsed arguments.
	 * @param string $classname Class name based on current view, home or single.
	 * @param string $contents  HTML for site title or logo.
	 */
	$html = apply_filters('simublog_site_logo', $html, $args, $classname, $contents);

	if (!$echo) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}




/** 
Add Image Size 
 **/
function simublog_thumbsize()
{

	add_image_size('simublog-blog-thumbnail', 420, 320, true);
}
add_action('after_setup_theme', 'simublog_thumbsize');





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simublog_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'simu-blog'),
			'id'            => 'sidebar',
			'description'   => esc_html__('Add widgets here.', 'simu-blog'),
			'before_widget' => '<section id="%1$s" class="widget widget_tag_cloud widget_search widget_recent_entries widget_text widget_categories widget_custom_html %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' 			=> esc_html__('Footer Menu Widget Area', 'simu-blog'),
			'id'        	=> 'footer_menu',
			'description' 	=> esc_html__('Footer Menu Area', 'simu-blog'),
			'before_widget' => '<div class="col-lg-3 col-md-6 col-sm-6"><div class="footer-link footer-text">',
			'after_widget' 	=> '</div></div>',
			'before_title' 	=> '<h4 class="footer-title mb-15">',
			'after_title' 	=> '</h4>',
		)
	);
}
add_action('widgets_init', 'simublog_widgets_init');

/**
Pagination
 **/

function simublog_the_posts_pagination()
{
	the_posts_pagination(array(
		'mid_size' => 2,
		'prev_text' => __('Previous', 'simu-blog'),
		'next_text' => __('Next', 'simu-blog'),
	));
}
