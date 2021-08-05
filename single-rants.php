<?php get_header(); ?>

<?php
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

<?php
    $itemid = $post->ID;
    $votenumber = get_field('vote_number');
    $authorid = $post->post_author;
    $authoridacf = 'user_' . $authorid;
    $rantssettings = get_field('confession_settings');
    $thedate = get_the_time( 'F jS, Y' );
    $headerimage = get_field('rants_header_image', 'option');
    $nextpost = get_next_post();
    $nextpostlink = get_permalink($nextpost);
    $prevpost = get_previous_post();
    $prevpostlink = get_permalink($prevpost);
    if ($rantssettings['user_submission'] === true){
        $authorname = get_field('confession_author_name');
    } else {
        $authorid = get_the_author_meta('ID');
        $authoridacf = 'user_' . $authorid;
        $authorname = get_field('author_box', $authoridacf)['author_name'];
        $authoremail = get_field('author_box', $authoridacf)['author_email'];
        $authorimage = get_field('author_box', $authoridacf)['author_image'];
        $authorgravatar = get_avatar_url($authoremail);
        $authorpagelink = get_author_posts_url($authorid);
        if (empty($authorimage)){
            $authorimage = $authorgravatar;
            $instagram = get_field( 'author_box', $authoridacf)['author_instagram'];
        };
    }
?>

<div class="article">
    <article>

        <header class="article__header panel">
            <div class="panel__inner">
                <div class="article__cats">
                    <a href="<?php echo get_site_url() . '/rants/' ?>" class="article__cats__cat">
                        <span>rants</span>
                    </a>
                </div>
                <div class="article__header__cat-description-mobile">
                <?php include( locate_template('includes/component-category-description--mobile.php' ) ); ?>
                </div>
                <h1 class="article__header__title"><?php the_title(); ?></h1>
            </div>
        </header>

        <div class="article__main">
        
            <div class="article__main__panel panel--nopad">
                <div class="panel__inner article__main__inner">
                    <div class="article__main-col main-col">
                        <div class="article__author">
                            <?php include( locate_template( 'includes/component-author-badge.php', false, false ) );  ?>
                        </div>
                        <div class="article__date">
                            <?php echo $thedate ?>
                        </div>
                        <div class="article__body">
                            <?php wpautop(the_content()); ?>
                        </div>
                        <div class="article__body-footer">
                            <div class="article__body-footer__voting">
                                <?php include( locate_template( 'includes/component-voting.php', false, false ) );  ?>
                            </div>
                            <div class="article__body-footer__share">
                            <?php include( locate_template( 'includes/component-article-share.php', false, false ) );  ?>
                            </div>
                            <?php if ($prevpost) : ?>
                                <a href="<?php echo $prevpostlink ?>" class="article__body-footer__link">Next Confession ></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <aside class="article__aside sidebar">
                        <?php get_template_part('includes/section', 'sidebar'); ?>
                    </aside>
                </div>
            </div>
            <?php if ($rantssettings['user_submission'] === false) : ?>
            <footer class="article__footer panel">
                <div class="panel__inner">
                    <?php include( locate_template( 'includes/component-author.php', false, false ) );  ?>
                </div>
            </footer>
            <?php endif; ?>

        </div><!-- end article main -->


    </article>
</div>


<?php endwhile;
endif; ?>

<div class="article__related">
    <?php include( locate_template( 'includes/component-related-rants.php') );  ?>
</div>







<?php get_footer(); ?>