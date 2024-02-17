<?php

function simublog_theme_color_settings_customizer_fields($fields)
{

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'simublog_header_menubar_color',
        'label'       => __('Header Menu bar Background', 'simu-blog'),
        'section'     => 'simublog_color_settings_section',
        'priority'    => 10,
        'default'     => '#ffff',
        'transport'   => 'postMessage',
        'output' => array(
            array(
                'element'  => '.header_style_2 .header-menu-area .header-main-menu',
                'property' => 'background-color',
            ),
        ),
    );


    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'simublog_header_background',
        'label'       => __('Header Background', 'simu-blog'),
        'section'     => 'simublog_color_settings_section',
        'priority'    => 10,
        'default'     => '#F6435B',
        'transport'   => 'postMessage',
        'output' => array(
            array(
                'element'  => '.breadcrumbs_section::before',
                'property' => 'background-color',
            ),
        ),
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'simublog_body_color',
        'label'       => __('Body Background', 'simu-blog'),
        'section'     => 'simublog_color_settings_section',
        'priority'    => 10,
        'default'     => '#fff',
        'transport'   => 'postMessage',
        'output' => array(
            array(
                'element'  => 'body',
                'property' => 'background-color',
            ),
        ),
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'simublog_footer_color',
        'label'       => __('Footer Background', 'simu-blog'),
        'section'     => 'simublog_color_settings_section',
        'priority'    => 10,
        'default'     => '#282B30',
        'transport'   => 'postMessage',
        'output' => array(
            array(
                'element'  => '.footer_style2',
                'property' => 'background-color',
            ),
        ),
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'simublog_footer_bottom_color',
        'label'       => __('Footer Copyrite Background', 'simu-blog'),
        'section'     => 'simublog_color_settings_section',
        'priority'    => 10,
        'default'     => '#F6435B',
        'transport'   => 'postMessage',
        'output' => array(
            array(
                'element'  => '.footer_style2 .footer-copyright',
                'property' => 'background-color',
            ),
        ),
    );

    return $fields;
}
add_filter('kirki/fields', 'simublog_theme_color_settings_customizer_fields');
