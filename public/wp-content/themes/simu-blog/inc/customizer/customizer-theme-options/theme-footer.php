<?php

function simublog_theme_footer_settings_customizer_fields($fields)
{
    $fields[] = array(
        'type'        => 'checkbox',
        'settings'    => 'simublog_footer_bottom_display',
        'label'       => __('Display Footer ?', 'simu-blog'),
        'section'     => 'simublog_footer_settings_section',
        'priority'    => 13,
        'default'     => false,
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'simublog_copyright_text',
        'label'       => __('Footer Copyright Text', 'simu-blog'),
        'default'     => 'Copyright ',
        'section'     => 'simublog_footer_settings_section',
        'priority'    => 13,
        'active_callback'  => [
            [
                'setting'  => 'simublog_footer_bottom_display',
                'operator' => '===',
                'value'    => true,
            ]
        ]
    );
    $fields[] = array(
        'type'        => 'hidden',
        'settings'    => 'simublog_footer_bottom_hidden',
        'section'    => 'simublog_footer_settings_section',

    );

    return $fields;
}
add_filter('kirki/fields', 'simublog_theme_footer_settings_customizer_fields');
