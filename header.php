<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php echo bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://apis.google.com/js/api.js"></script>


    <?php wp_head();?>
</head>
<!-- End head -->

<!-- Body start -->

<body <?php body_class();?>>

    <!-- Start header -->
    <div id="okmg-header" class="okmg-header">
        <div class="okmg-container">
            <div class="header-wrapper">

                <div class="okmg-logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
$site_title = get_bloginfo('name');

if (has_custom_logo()) {
    $logo_image = $image[0];

    echo "<img src='$logo_image' alt='$site_title'>";
} else {
    echo "<span class='site-title'>$site_title</span>";
}
?>
                    </a>

                </div>
                <div class="okmg-main-menu">
                    <?php
echo wp_nav_menu(array(
    'menu' => 'Primary Menu', // Do not fall back to first non-empty menu.
    'theme_location' => 'primary_menu',
))
?>
                </div>

                <div id="okmg_ham_menu" class='okmg_ham_menu'>
                    <span class='line'></span>
                    <span class='line'></span>
                    <span class='line'></span>
                </div>

            </div>
        </div>
    </div>

    <!-- End header -->

    <!-- Start Body -->

    <div id="main" class="page-container">
        <div class="okmg-container">