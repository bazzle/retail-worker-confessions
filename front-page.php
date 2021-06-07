<?php get_header(); ?>
    <div class="homepage">
        <div class="homepage__main panel">
            <div class="panel__inner">
                <div class="homepage__main-col main-col">
                    <?php
                    $heroPost = get_field( "hero_item" );
                    if ($heroPost) :
                        $heroPostId = $heroPost->ID;
                        $heroPostType = $heroPost->post_type;
                        $heroPostTitle = get_the_title($heroPostId);
                        $heroPostLink = get_the_permalink($heroPostId);
                        $heropostExcerpt = get_field('confession_short_excerpt', $heroPostId);
                        if ($heroPostType === 'confessions'){
                            $heropostExcerpt = get_field('confession_short_excerpt', $heroPostId);
                            $heroPostImage = get_field( "confession_hero_image", $heroPostId );
                        } elseif ($heroPostType === 'rants') {
                            $heropostExcerpt = get_field('rant_short_excerpt', $heroPostId);
                            $heroPostImage = get_field( "rant_hero_image", $heroPostId );
                        } else {
                            $heropostExcerpt = get_field('article_excerpt', $heroPostId);
                            $heroPostImage = get_field( "article_hero_image", $heroPostId );
                        };
                        
                        $heroPostImageurl = $heroPostImage['url'];
                        $heroPostImageAlt = $heroPostImage['alt'];
                    ?>
                    <div class="homepage__hero-item">
                        <a class="homepage__hero-item__image" href="<?php echo $heroPostLink ?>">
                            <img class="homepage__hero-item__image__image" src="<?php echo $heroPostImageurl ?>" alt="<?php echo $heroPostImageAlt ?>">
                        </a>
                        <a href="<?php echo $heroPostLink ?>" class="homepage__hero-item__title">
                            <h2 class="homepage__hero-item__title__title">
                                <?php echo $heroPostTitle; ?>
                            </h2>
                        </a>
                        <p class="homepage__hero-item__excerpt">
                            <?php echo $heropostExcerpt ?>
                        </p>
                        <a class="homepage__hero-item__link" href="<?php echo $heroPostLink ?>">Read more</a>
                    </div>
                    <?php endif; ?>
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