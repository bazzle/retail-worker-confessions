<?php get_header(); ?>
    <div class="homepage">
        <div class="homepage__main panel">
            <div class="panel__inner">
                <div class="homepage__main-col main-col">
                    <?php
                    $heroPostId = get_field( "hero_item" );
                    $heroPostImage = get_field( "article_hero_image", $heroPostId )['url'];
                    $heroPostImageAlt = get_field( "article_hero_image", $heroPostId )['alt'];
                    $heroPostImageAlt = ($heroPostImageAlt == '') ? 'Hero image' : $heroPostImageAlt;
                    $heroPostTitle = get_the_title($heroPostId);
                    $heroPostLink = get_the_permalink($heroPostId);
                    ?>
                    <div class="homepage__hero">
                        <a class="homepage__hero__image" href="<?php echo $heroPostLink ?>">
                            <img class="homepage__hero__image__image" src="<?php echo $heroPostImage ?>" alt="<?php echo $heroPostImageAlt ?>">
                        </a>
                        <a href="<?php echo $heroPostLink ?>" class="homepage__hero__title">
                            <?php echo $heroPostTitle; ?>
                        </a>
                    </div>
                    <?php get_template_part('includes/section','content-section'); ?>
                </div>
                <div class="homepage__aside">
                    <?php get_template_part('includes/section', 'sidebar'); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>