<footer class="footer">
    <div class="panel">

        <div class="panel__inner footer__inner">
            <div class="footer__copyright">
                <span>&copy; BR Web Ltd</span>
            </div>

            <nav class="footer__menu" aria-label="Secondary 1">
                <?php
                    wp_nav_menu(
                        array(
                            'menu_class'=> 'footer__menu__list',
                            'theme_location' => 'footer-menu-location'
                        )
                    )
                ?>
            </nav>

            <a class="footer__facebook-link" href="https://www.facebook.com/groups/retailstolemylife">
                <svg class="footer__facebook-link__logo">
                    <title>Facebook icon</title>
                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/build/svg/icons.svg#share-facebook" />
                </svg>
                <span class="footer__facebook-link__label">Retail worker confessions</span>
            </a>

        </div>

    </div>
</footer>