<?php

/***
 * Theme Options customizer options
 * 
 * 
 */
function simublog_theme_options_customizer_sections($wp_customize)
{
    /**
     * Add panels
     */
    $wp_customize->add_panel('simublog_theme_customizer', array(
        'priority'    => 10,
        'title'       => __('Simu Theme Options', 'simu-blog'),
    ));
    /**
     * Add sections
     */
    $wp_customize->add_section('simublog_color_settings_section', array(
        'title'       => __('Color Settings', 'simu-blog'),
        'priority'    => 15,
        'panel'       => 'simublog_theme_customizer',
    ));

    /**
     * Add sections
     */
    $wp_customize->add_section('simublog_footer_settings_section', array(
        'title'       => __('Footer Settings', 'simu-blog'),
        'priority'    => 16,
        'panel'       => 'simublog_theme_customizer',
    ));
}
add_action('customize_register', 'simublog_theme_options_customizer_sections');



//Theme Options Color Settings
get_template_part('inc/customizer/customizer-theme-options/theme-color');

//Theme Options Footer Settings
get_template_part('inc/customizer/customizer-theme-options/theme-footer');
