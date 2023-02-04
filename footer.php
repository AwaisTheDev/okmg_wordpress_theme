</div>

</div>

<!-- End body -->
<!-- Start Footer -->
<footer class="okmg-footer">

    <div class="okmg-container">
        <div class="okmg-footer-main">
            <div class="okmg-footer-address">
                <div class="address-single">
                    <h4>Perth</h4>
                    <p>608 - 610 Stirling Hwy<br>
                        Mosman Park, Perth WA, 6012</p>
                </div>
                <div class="address-single">
                    <h4>Melbourne</h4>
                    <p>
                        Level 17, 31 Queen St<br>
                        Melbourne, VIC, 3000
                    </p>
                </div>
                <div class="address-single">
                    <h4>Sydney</h4>
                    <p>333 George St<br>
                        Sydney, NSW, 2000</p>
                </div>
            </div>

            <div class="footer-bottom">
                <?php
echo wp_nav_menu(array(
    'menu' => 'Footer Social Links', // Do not fall back to first non-empty menu.
    'theme_location' => 'footer_social_links',
    'container_class' => 'footer-social-links',
))
?>

                <?php
echo wp_nav_menu(array(
    'menu' => 'Footer Menu', // Do not fall back to first non-empty menu.
    'theme_location' => 'footer_menu',
    'container_class' => 'footer-bottom-links',
))
?>


            </div>
        </div>


    </div>
    </div>

</footer>

<?php wp_footer();?>

</body>

</html>