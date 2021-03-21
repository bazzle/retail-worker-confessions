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
    <div class="mobile-menu__main">
        <nav class="mobile-menu__inner">
            <?php wp_nav_menu( $args ) ?>
        </nav>
    </div>
    <div class="mobile-menu__signup">
        <?php get_template_part('includes/component','signup-form'); ?>
    </div>
    <div class="mobile-menu__footer">
        <nav class="mobile-menu__inner">
            <?php wp_nav_menu( $args2 ) ?>
        </nav>
    </div>
</div>