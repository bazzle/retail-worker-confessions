<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $title = 'Confessions';
    $excerpt = get_field('confession_description', 'option');
    $headerimage = get_field('confessions_header_image', 'option');
    ?>

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
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'showposts' => 10,
                                    'post_type' => 'confessions'
                                );
                                $confessions_posts = new WP_Query($args);

                                if($confessions_posts->have_posts()) :

                                    while($confessions_posts->have_posts()) :
                                        $confessions_posts->the_post();
                                        $confessionsettings = get_field('confession_settings',$post);
                                        $itemid = $post->ID;
                                        $itemdate = get_the_date( 'F n, Y', $post);
                                        $authorid = $post->post_author;
                                        $authoridacf = 'user_' . $authorid;
                                        $itemexcerpt = get_field('confession_excerpt',$post);
                                        $itemcontent = $post->post_content;
                                        $votenumber = get_field('vote_number',$post);
                                        if ($confessionsettings['user_submission'] === true){
                                            $itemauthor = get_field('confession_author_name');
                                        } else {
                                            $itemauthor = get_field('author_box', $authoridacf)['author_name'];
                                        }
                                        if ($confessionsettings['long_submission'] === true){
                                            $itemcontent = $itemexcerpt;
                                        } else {
                                            $itemcontent = $itemcontent;
                                        }
                                        $itemid = $post->ID;
                                        $itemtitle = $post->post_title;
                                        $itemlink = get_permalink($itemid);
                                        ?>


                                        <div class="posts-list--stacked__item post-list-item-stacked">
                                            <h3 class="post-list-item-stacked__title">
                                                <a href="<?php echo $itemlink ?>"><?php echo $itemtitle; ?></a>
                                            </h3>
                                            <div class="post-list-item-stacked__meta">
                                                <span
                                                    class="post-list-item-stacked__meta__item"><?php echo $itemauthor ?></span>
                                                <span class="post-list-item-stacked__meta__item"><?php echo $itemdate ?></span>
                                            </div>
                                            <div class="post-list-item-stacked__content">
                                                <?php echo wpautop( $itemcontent ) ?>
                                            </div>
                                            <div class="post-list-item-stacked__footer">
                                                <?php if ($confessionsettings['long_submission'] === true) : ?>
                                                    <a href="<?php echo $itemlink ?>"
                                                        class="post-list-item-stacked__footer__read-more">Read more</a>
                                                <?php else : ?>
                                                    <?php include( locate_template( 'includes/component-voting.php', false, false ) );  ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    <?php
                                    endwhile; 
                                else : ?>
                                    <p>No confessions yet</p>
                                <?php endif; ?>
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