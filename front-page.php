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
                    $heropostExcerpt = get_field('article_excerpt', $heroPostId);
                    ?>
                    <div class="homepage__hero-item">
                        <a class="homepage__hero-item__image" href="<?php echo $heroPostLink ?>">
                            <img class="homepage__hero-item__image__image" src="<?php echo $heroPostImage ?>" alt="<?php echo $heroPostImageAlt ?>">
                        </a>
                        <a href="<?php echo $heroPostLink ?>" class="homepage__hero-item__title">
                            <h2 class="homepage__hero-item__title__title">
                                <?php echo $heroPostTitle; ?>
                            </h2>
                        </a>
                        <?php  ?>
                        <p class="homepage__hero-item__excerpt">
                            <?php echo $heropostExcerpt ?>
                        </p>
                    </div>
                    <?php if( have_rows('content_section') ): ?>
                        <?php include( locate_template( 'includes/section-content-section.php') );  ?>
                    <?php endif; ?>
                </div>
                <div class="homepage__aside sidebar">
                    <?php get_template_part('includes/section', 'sidebar'); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>