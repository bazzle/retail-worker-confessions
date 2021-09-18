<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $title = get_field('confessions_page_title', 'option');
    $excerpt = get_field('confession_description', 'option');
    $headerimage = get_field('confessions_header_image', 'option');
    ?>

<div class="page">
    <header class="page__header panel">
        <div class="panel__inner">
            <div class="page__header__main">
                <h1 class="page__header__title"><?php echo $title; ?></h1>
                <div class="page__header__cat-description">
                    <?php include( locate_template('includes/component-category-description--main.php' ) ); ?>
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
                                    'post_type' => 'confessions'
                                );
                                $confessions_posts = new WP_Query($args);
                                if($confessions_posts->have_posts()) :
                                    while($confessions_posts->have_posts()) :
                                        $confessions_posts->the_post();
                                        include(locate_template('includes/section-confessions-posts.php'));
                                    endwhile;
                                else : ?>
                                    <p>No confessions yet</p>
                                <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end content section -->
            </div>
            <div class="page__aside sidebar">
                <?php include( locate_template( 'includes/section-sidebar.php', false, false ) );  ?>
                <?php  ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>