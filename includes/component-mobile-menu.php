<?php
    $args = array(
        'theme_location'=> 'mobile-menu-location',
        'menu_class'=> 'mobile-menu__list',
        'container'=> false
    );
    $args2 = array(
        'theme_location'=> 'footer-menu-location',
        'menu_class'=> 'mobile-menu__list',
        'container'=> false
    );
?>

<div class="mobile-menu close">
    <div class="mobile-menu__main panel panel--nopad">
        <nav class="mobile-menu__inner panel__inner">
            <?php wp_nav_menu( $args ) ?>
        </nav>
    </div>
    <div class="mobile-menu__footer panel">
        <nav class="mobile-menu__inner panel__inner">
            <?php wp_nav_menu( $args2 ) ?>
        </nav>
    </div>
</div>