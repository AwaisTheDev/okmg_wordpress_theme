<?php

//Define root constant
if (!defined('OKMG_ROOT_DIR_PATH')) {
    define('OKMG_ROOT_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('OKMG_ROOT_DIR_URI')) {
    define('OKMG_ROOT_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once OKMG_ROOT_DIR_PATH . '/lib/acf-fields.php';
require_once OKMG_ROOT_DIR_PATH . '/lib/enqueue-scripts.php';
require_once OKMG_ROOT_DIR_PATH . '/lib/theme-support.php';

function okmg_register_nav_menus()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'okmg'),
        'footer_social_links' => __('Footer Social Links', 'okmg'),
        'footer_menu' => __('Footer Menu', 'okmg'),
    ));
}
add_action('after_setup_theme', 'okmg_register_nav_menus', 10);
