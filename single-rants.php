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
                <h1 class="article__title"><?php the_title(); ?></h1>
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
                            <div class="article__body__footer">
                                <?php include( locate_template( 'includes/component-voting.php', false, false ) );  ?>
                            </div>
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

<div class="article__related component-dark panel">
    <div class="article__related__inner panel__inner">
        <div class="article__related__title">
            <h2 class="article__related__title__title">Related Articles</h2>
        </div>
        <div class="posts-list posts-list--flickity">
            <div class="flickity-carousel flickity-carousel--3x">

                <?php
                $thispostid = $post->ID;
                $thiscategory = get_the_category($post);
                $thiscategoryid = $thiscategory[0]->term_id;
                $related_posts = get_posts(array(
                    'posts_per_page' => 3,
                    'category' => $thiscategoryid,
                    'exclude' => $thispostid
                ));
                $related_posts_count = count($related_posts);
                if ($related_posts_count === 4 or $related_posts_count === 5){
                    $related_posts = array_slice($related_posts, 0, 3);
                }
            ?>

                <?php foreach($related_posts as $related_post) :
                $itemid = $related_post->ID;
                $cardtitle = $related_post->post_title;
                $cardlink = get_permalink($itemid);
                $cardexcerpt = get_field('article_excerpt',$related_post);
                $cardthumb = get_the_post_thumbnail($itemid,'thumb');
                ?>
                <div class="posts-list__item">
                    <?php include(locate_template('includes/component-card.php')); ?>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>


</div>







<?php get_footer(); ?>