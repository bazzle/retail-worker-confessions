<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $title = $term->name;
    $thiscategory = $term->cat_ID;
    $featuredPostNumber = 4;
    $count = $term->count;
    $excerpt = category_description($thiscategory);
    $headerimage = get_field('header_image', $term);
    ?>
    <?php  ?>
<div class="page">
    <header class="page__header panel">
        <div class="panel__inner">
            <div class="page__header__main">
                <h1 class="page__header__title"><?php echo $title; ?></h1>
                <div class="page__header__excerpt"><?php echo $excerpt; ?></div>
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
                <?php
                    if($count  % 2 == 0){
                        $featuredPostNumber = $featuredPostNumber;
                    }
                    else{
                        $featuredPostNumber = $count-1;
                    }
                ?>
                <div class="content-section">
                    <div class="content-section__item">
                        <div class="content-section__item__title">
                            <h2 class="content-section__item__title__title">Latest</h2>
                        </div>
                        <div class="content-section__item__content">
                            <div class="posts-list">
                                <?php
                                    $recent_posts = get_posts(array(
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'showposts' => $featuredPostNumber,
                                        'category' => $thiscategory
                                        ));
                                    ?>
                                <?php foreach ($recent_posts as $recent_post) :
                                    $cardtitle = $recent_post->post_title;
                                    $cardlink = get_permalink($recent_post);
                                    $cardthumb = get_the_post_thumbnail($recent_post,'thumb');
                                    ?>
                                <?php include( locate_template( 'includes/component-card.php' ) );  ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <?php if ( $count > $featuredPostNumber ) : ?>
                    <div class="content-section__item">
                        <div class="content-section__item__title">
                            <h2 class="content-section__item__title__title">All posts</h2>
                        </div>
                        <div class="content-section__item__content">
                            <div class="post-list__list">
                                <?php
                                    $args = array(
                                        'offset' => $featuredPostNumber,
                                        'cat' => $thiscategory
                                    );
                                    $category_posts = new WP_Query($args);
                                    if($category_posts->have_posts()) :
                                        while($category_posts->have_posts()) :
                                            $category_posts->the_post();
                                            $itemtitle = get_the_title();
                                            $itemlink = get_the_permalink();
                                            $itemthumb = get_the_post_thumbnail($itemid,'tiny');
                                            include(locate_template('includes/component-post-list-item--image.php'));
                                        endwhile;
                                        else:
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div><!-- end content section -->






            </div>
            <div class="page__aside sidebar">
                <?php get_template_part('includes/section', 'sidebar-category'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>