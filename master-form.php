<?php /* Template Name: Master Form */?>

<?php get_header()?>

<div class="okmg-master-form-wrapper">

    <div class="okmg-master-form">
        <?php
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
$site_title = get_bloginfo('name');

if (has_custom_logo()) {
    $logo_image = $image[0];

    echo "<img src='$logo_image' class='master-form-logo' alt='$site_title'>";
} else {
    echo "<span class='site-title'>$site_title</span>";
}
?>
        <form method="POST" action="?">
            <div class="form-two-col-row">
                <div class="okmg-input-wrapper">
                    <label class="okmg-label" for='msf-name'>Name</label>
                    <input class="okmg-input" type="text" id='msf-name' name='msf-name' placeholder="Enter your name"
                        required="required">
                </div>
                <div class="okmg-input-wrapper">
                    <label class="okmg-label" for='msf-phone'>Phone</label>
                    <input class="okmg-input" type="tel" id='msf-phone' name='msf-phone'
                        placeholder="Enter your phone number" required="required">
                </div>
            </div>

            <div class="okmg-input-wrapper">
                <label class="okmg-label" for='msf-email'>Email</label>
                <input class="okmg-input" type="email" id='msf-email' name='msf-email'
                    placeholder="Enter your Email Address" required="required">
            </div>

            <div class='msf-custom-inputs'>
                <?php
if (class_exists('ACF')) { //check if ACF plugin is installed
    if (have_rows('dynamic_inputs')) {
        while (have_rows('dynamic_inputs')) {
            the_row();

            echo "<div class='okmg-input-wrapper'>";
            $input_type = get_sub_field('input_type');
            $input_label = get_sub_field('label');
            $input_name = get_sub_field('name');
            $input_placeholder = get_sub_field('placeholder');
            $input_required = get_sub_field('required');

            echo "<label class='okmg-label' for='msf-$input_name' placeholder='$input_placeholder'>$input_label</label>";

            if ($input_type == "text") {
                echo "<input class='okmg-input' type='text' name='msf-$input_name' id='msf-$input_name' placeholder='$input_placeholder' >";
            } elseif ($input_type == "textarea") {
                echo "<textarea class='okmg-input' name='msf-$input_name' id='msf-$input_name' placeholder='$input_placeholder' ></textarea>";
            } elseif ($input_type == "select") {
                $options_list = get_sub_field('select_options');
                $options = explode('|', $options_list);
                if (!empty($options)) {
                    echo "<select class='okmg-input' name='msf-$input_name' id='msf-$input_name'>";
                    foreach ($options as $option) {
                        echo "<option>$option</option>";
                    }
                    echo "</select>";
                }

            }

            echo "</div>";

        }

    }
}
?>
            </div>
            <div class="okmg-submit-wrapper">
                <button class="okmg-submit-button" type="submit">Submit</buttom>
            </div>

            <div class="okmg-result">

            </div>


        </form>

        <img class="form-bottom-left" src='<?php echo OKMG_ROOT_DIR_URI ?>/dist/assets/images/form-bottom-left.svg'>
        <img class="form-bottom-right" src='<?php echo OKMG_ROOT_DIR_URI ?>/dist/assets/images/form-bottom-right.svg'>
    </div>

    <img class="page-bottom-left" src='<?php echo OKMG_ROOT_DIR_URI ?>/dist/assets/images/page-bottom-left.svg'>
    <img class="page-bottom-right" src='<?php echo OKMG_ROOT_DIR_URI ?>/dist/assets/images/page-bottom-right.svg'>
</div>

<?php get_footer()?>