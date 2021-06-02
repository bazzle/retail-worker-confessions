<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $title = $term->name;
    $thiscategory = 3;
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
                <div class="content-section">
                    <div class="content-section__item">
                        <div class="content-section__item__title">
                            <h2 class="content-section__item__title__title">Latest</h2>
                        </div>
                        <div class="content-section__item__content">
                            <div class="posts-list--stacked">
                                <?php
                                $recent_posts = get_posts(array(
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => $numberofposts,
                                    'category' => $thiscategory
                                ));
                                ?>
                                <?php foreach ($recent_posts as $recent_post) :
                                    $confessionsettings = get_field('confession_settings',$recent_post);
                                    $itemid = $recent_post->ID;
                                    $itemdate = get_the_date( 'F n, Y', $recent_post);
                                    $authorid = $recent_post->post_author;
                                    $authoridacf = 'user_' . $authorid;
                                    $itemexcerpt = get_field('confession_excerpt',$recent_post);
                                    $itemcontent = $recent_post->post_content;
                                    $votenumber = get_field('vote_number',$recent_post);
                                    if ($confessionsettings['user_submission'] === true){
                                        $authorname = get_field('confession_author_name');
                                    } else {
                                        $authorname = get_field('author_box', $authoridacf)['author_name'];
                                    }
                                    if ($confessionsettings['long_submission'] === true){
                                        $itemcontent = $itemexcerpt;
                                    } else {
                                        $itemcontent = $itemcontent;
                                    }
                                    $itemid = $recent_post->ID;
                                    $itemtitle = $recent_post->post_title;
                                    $itemlink = get_permalink($itemid);
                                ?>
                                
                                <div class="posts-list--stacked__item post-list-item-stacked">
                                    <h3 class="post-list-item-stacked__title">
                                        <a href="<?php echo $itemlink ?>"><?php echo $itemtitle; ?></a>
                                    </h3>
                                    <div class="post-list-item-stacked__meta">
                                        <span class="post-list-item-stacked__meta__item"><?php echo $authorname ?></span>
                                        <span class="post-list-item-stacked__meta__item"><?php echo $itemdate ?></span>
                                    </div>
                                    <div class="post-list-item-stacked__content">
                                        <?php echo wpautop( $itemcontent ) ?>
                                    </div>
                                    <div class="post-list-item-stacked__footer">
                                        <?php
                                        if ($confessionsettings['long_submission'] === true) : ?>
                                            <a href="<?php echo $itemlink ?>" class="post-list-item-stacked__footer__read-more">Read more</a>
                                        <?php else : ?>
                                            <?php include( locate_template( 'includes/component-voting.php', false, false ) );  ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end content section -->






            </div>
            <div class="page__aside sidebar">
                <?php get_template_part('includes/section', 'sidebar-category'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>