<?php

//Define root constant
if (!defined('OKMG_ROOT_DIR_PATH')) {
    define('OKMG_ROOT_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('OKMG_ROOT_DIR_URI')) {
    define('OKMG_ROOT_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once OKMG_ROOT_DIR_PATH . '/lib/enqueue-scripts.php';