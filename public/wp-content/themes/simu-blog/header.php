<?php

/**
 * Header of Simu Blog theme
 * @package Simu Blog
 * @subpackage Simu Blog
 * @since Simu Blog 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if (function_exists('wp_body_open')) {
		wp_body_open();
	} else {
		do_action('wp_body_open');
	}
	?>
	<?php
	/**
	 * Hook - simublog_action_header
	 *
	 * @hooked simublog_main_header - 10
	 */
	do_action('simublog_action_header');
	?>

	<?php

	/**
	 * Banner start
	 * 
	 * @hooked simublog_blog_banner_header - 10
	 */
	do_action('simublog_blog_banner_header');
