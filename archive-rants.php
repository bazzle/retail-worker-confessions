<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $title = 'Rants';
    $excerpt = get_field('rants_description', 'option');
    $headerimage = get_field('rants_header_image', 'option');
    ?>

<div class="page">
    <header class="page__header panel">
        <div class="panel__inner">
            <div class="page__header__main">
                <h1 class="page__header__title"><?php echo $title; ?></h1>
                <div class="page__header__cat-description">
                    <?php include( locate_template('includes/component-category-description--mobile.php' ) ); ?>
                </div>
            </div>
            <?php if ($headerimage) : ?>
            <div class="page__header__side">
                <div class="page__header__image">
                    <img src="<?php echo $headerimage['url'] ?>" alt="<?php echo $headerimage['alt'] ?>" />
                </div>
            </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="page__main panel">
        <div class="panel__inner">
            <div class="page__main-col main-col">
                <?php include(locate_template( 'includes/component-filter.php' )) ?>
                <div class="content-section">
                    <div class="content-section__item">
                        <div class="content-section__item__content">
                            <div class="posts-list--stacked">
                                <?php 
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1,
                                    'post_type' => 'rants'
                                );
                                $rants_posts = new WP_Query($args);
                                if($rants_posts->have_posts()) :
                                    while($rants_posts->have_posts()) :
                                        include(locate_template('includes/section-rants-posts.php'));
                                    endwhile; 
                                else : ?>
                                    <p>No rants yet</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end content section -->






            </div>
            <div class="page__aside sidebar">
                <?php get_template_part('includes/section', 'sidebar'); ?>
            </div>


        </div>
    </div>
</div>
<?php get_footer(); ?>