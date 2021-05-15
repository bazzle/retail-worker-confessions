<?php get_header(); ?>

<?php
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

<?php
    $authorid = get_the_author_meta('ID');
    $authoridacf = 'user_' . $authorid;
    $authorname = get_field('author_box', $authoridacf)['author_name'];
    $authoremail = get_field('author_box', $authoridacf)['author_email'];
    $authorimage = get_field('author_box', $authoridacf)['author_image'];
    $authorgravatar = get_avatar_url($authoremail);
    $authorbio = get_field('author_box', $authoridacf)['author_short_bio'];
    $authorpagelink = get_author_posts_url($authorid);
    $twitter = get_field( 'author_box', $authoridacf)['author_twitter'];
    $instagram = get_field( 'author_box', $authoridacf)['author_instagram'];
    $headerimage = get_field('confessions_header_image', 'option');
    //$date = the_date();
    if (empty($authorimage)){
        $authorimage = $authorgravatar;
    };
?>

<div class="article">
    <article>

        <header class="article__header panel">
            <div class="panel__inner">
                <div class="article__cats">
                    <a href="<?php echo get_site_url() . '/confessions/' ?>" class="article__cats__cat">
                        <span>Confessions</span>
                    </a>
                </div>
                <h1 class="article__title"><?php the_title(); ?></h1>
            </div>
        </header>

        <div class="article__main">

            <?php $articlechunks = get_field('article_content'); ?>
            <?php if ($articlechunks) : ?>
            <?php foreach($articlechunks as $chunk) :
            $content = $chunk['article_content_chunk'];
            $side = $chunk['article_chunk_side'];
            $footer = $chunk['article_chunk_footer'];
            ?>
                <div class="article__leadin-section panel panel--nopad">
                    <div class="panel__inner article__leadin-section__inner">
                        <div class="article__leadin-section__main-col main-col">
                            <div class="article__author">
                                <div class="article__author__image">
                                    <img class="article__author__image__image" src="<?php echo $authorimage ?>"
                                        alt="Profile image of <?php echo $authorname ?>">
                                </div>
                                <a class="article__author__name" href="<?php echo $authorpagelink ?>">
                                    <?php echo $authorname; ?>
                                </a>
                            </div>
                            <div class="article__date">
                                <?php echo $thedate ?>
                            </div>
                            <div class="article__hero">
                                <?php
                                    $heroImage = get_field("article_hero_image");
                                    $heroImageUrl = $heroImage['url'];
                                    $heroImageAlt = $heroImage['alt'];
                                    ?>
                                <img class="article__hero__image" src="<?php echo $heroImageUrl ?>"
                                    alt="<?php echo $heroImageAlt ?>">
                            </div>
                        </div>
                        <div class="article__leadin-section__aside aside">
                            Aside here
                        </div>
                    </div>
                </div>

                <div class="article__chunk panel panel--nopad">
                    <div class="panel__inner article__chunk__inner">
                        <div class="article__chunk__main-col main-col">
                            <div class="article__body">
                                <?php echo $content ?>
                            </div>
                        </div>
                        <?php if ($side) : ?>
                        <aside class="article__chunk__aside sidebar">
                            <?php echo $side ?>
                        </aside>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($footer) : ?>
                <div class="article__chunk__footer panel">
                    <div class="panel__inner">
                        <?php echo $footer ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php else : ?>
                <div class="article__main__panel panel--nopad">
                    <div class="panel__inner article__main__inner">
                        <div class="article__main-col main-col">
                            <div class="article__author">
                                <div class="article__author__image">
                                    <img class="article__author__image__image" src="<?php echo $authorimage ?>"
                                        alt="Profile image of <?php echo $authorname ?>">
                                </div>
                                <a class="article__author__name" href="<?php echo $authorpagelink ?>">
                                    <?php echo $authorname; ?>
                                </a>
                            </div>
                            <div class="article__date">
                                <?php the_date(); ?>
                            </div>
                            <div class="article__body">
                                <?php wpautop(the_content()); ?>
                            </div>
                        </div>
                        <aside class="article__aside sidebar">
                            <?php get_template_part('includes/section', 'sidebar'); ?>
                        </aside>
                    </div>
                </div>
            <?php endif; ?>

            <footer class="article__footer panel">
                <div class="panel__inner">
                    <?php include( locate_template( 'includes/component-author.php', false, false ) );  ?>
                </div>
            </footer>

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
                    'showposts' => 3,
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