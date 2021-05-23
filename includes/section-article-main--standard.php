<div class="article__main panel panel--nopad">
    <div class="panel__inner article__main__inner">
        <div class="article__main-col main-col">
            <div class="article__author">
                <?php include( locate_template( 'includes/component-author-badge.php', false, false ) );  ?>
            </div>
            <div class="article__date">
                <?php the_date(); ?>
            </div>
            <div class="article__hero">
                <?php
                    $heroImage = get_field("article_hero_image");
                    $heroImageUrl = $heroImage['url'];
                    $heroImageAlt = $heroImage['alt'];
                    ?>
                <img class="article__hero__image" src="<?php echo $heroImageUrl ?>"
                    alt="<?php echo $heroImageAlt ?>">
            </div>
            <div class="article__body">
                <?php wpautop(the_content()); ?>
            </div>
        </div>
        <aside class="article__aside sidebar">
            <?php get_template_part('includes/section', 'sidebar'); ?>
        </aside>
    </div>
</div>