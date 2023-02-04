<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $page_title = get_the_title();
        echo "<h1 class='okmg-page-title'>$page_title</h1>";
        echo "<div class='page-content'>";
        echo get_the_content();
        echo "</div>";
    }
}
