<?php

function okmg_load_assets()
{
    wp_enqueue_style('okmg_styles', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), 1.0, 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('okmg_theme_script', get_template_directory_uri() . '/dist/assets/js/bundle.js', array(), 1.0, true);
}

add_action('wp_enqueue_scripts', 'okmg_load_assets');