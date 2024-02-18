<?php


add_action( 'wp_enqueue_scripts', 'hubspot_blog_theme_enqueue_styles' );
function hubspot_blog_theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style',
 get_stylesheet_directory_uri() . '/style.css' ,
 array('parent-style'),
 wp_get_theme()->('Version') 
);


}

function child_theme_enqueue_scripts(){
    wp-enqueue-script('custom-script', get_stylesheet_directory_uri() . '/wp-content/themes/mom-vs-real-world1/script.js', array('jquery'), '1.0',true);
}
add_action( 'wp_enqueue_scripts','child_theme_enqueue_scripts' );

function enqueue_custom_scripts(){
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri(). '/custom.js', array('jquery'), '1.0', true);

    wp_localize_script('custom-script', 'wp_data', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function latest_posts_callback(){
    $args = array(
        'posts_per_page' => 1,
        'orderby'        =>'date',
        'order'          =>'DESC',
    );
    $latest_post = new WP_Query( $args );

    if($latest_post->have_posts()){
        $latest_post->the_post();
        $output ='<h2> Latest Post: <a href="' .get_permalink() .get_the_title() .'</a></h2>';
     }
     wp_reset_postdata();
    } else{
        return 'No posts found';
    }
    wp_die();

add_action('wp_ajax_get_latest_post', 'get_latest_post_callback');
add_action('wp_ajax_nopriv_get_latest_post', 'get_latest_post_callback');

echo do_shortcode('[smartslider3 slider="2"]');