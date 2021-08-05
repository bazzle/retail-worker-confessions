<header class="header">
    <div class="panel panel--nopad">
        <div class="panel__inner header__inner">
            <div class="header__logo-lockup">
                <a href="<?php echo get_option('home'); ?>" class="header__logo-lockup__logo">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="logo" />
                </a>
            </div>
            <nav role="navigation" aria-label="Main" class="header__menu">
            <?php
                $args = array(
                    'theme_location'=> 'main-menu-location',
                    'menu_class'=> 'header__menu__list',
                    'container'=> false
                );
                ?>
                <?php wp_nav_menu( $args ) ?>
            </nav>
            <button type="button" class="header__trigger trigger-menu">
                <span class="header__trigger__label">Menu</span>
                <svg class="icon header__trigger__icon">
                    <use xlink:href="<?php echo get_template_directory_uri() ?>/build/svg/icons.svg#icon-menu" />
                </svg>
                <img src="<?php get_template_directory_uri() ?>/assets/images/logo.svg ?>" alt="logo">
            </button>
        </div>
        <?php get_template_part('includes/component','mobile-menu'); ?>
    </div>
    <div class="progress-indicator hidden" aria-hidden="true">
        <div class="progress-indicator__container">
            <div class="progress-indicator__progress-bar" id="myBar"></div>
        </div>
    </div>
</header>