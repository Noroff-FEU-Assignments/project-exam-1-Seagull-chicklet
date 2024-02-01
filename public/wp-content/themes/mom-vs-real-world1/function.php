<?php
  add_action( 'wp_enqueue_scripts', 'hubspot_blog_theme_enqueue_styles' );
 function hubspot_blog_theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 wp_enqueue_style( 'child-style', get_template_directory_uri() . '/style.css' 
  array('parent-style'), wp_get_theme()->get('Version'));
}
