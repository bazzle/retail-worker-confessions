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
    if (empty($authorimage)){
        $authorimage = $authorgravatar;
    };
?>

<div class="article">
    <article>
        <header class="article__header panel">
            <div class="panel__inner">
                <div class="article__cats">
                    <?php $catlist = get_the_category();
                    foreach ($catlist as $cat) :
                        $catname = $cat->name;
                        $catlink = get_category_link($cat);
                    ?>
                    <a href="<?php echo $catlink ?>" class="article__cats__cat">
                        <span><?php echo $catname ?></span>
                    </a>
                    <?php endforeach ?>
                </div>
                <h1 class="article__title"><?php the_title(); ?></h1>
            </div>
        </header>

        <div class="article__main panel panel--nopad">
            <div class="panel__inner article__main__inner">
                <div class="article__main-col main-col">
                    <div class="article__author">
                        <div class="article__author__image">
                            <img class="article__author__image__image" src="<?php echo $authorimage ?>" alt="Profile image of <?php echo $authorname ?>">
                        </div>
                        <div class="article__author__name">
                            <?php echo $authorname; ?>
                        </div>
                    </div>
                    <div class="article__date">
                        <?php the_date(); ?>
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
                    <div class="article__body">
                        <?php wpautop(the_content()); ?>
                    </div>
                </div>
                <aside class="article__aside">
                    <?php get_template_part('includes/section', 'sidebar'); ?>
                </aside>
            </div>
        </div>

        <footer class="article__footer panel">
            <div class="panel__inner">
                <?php include( locate_template( 'includes/component-author.php', false, false ) );  ?>
            </div>
        </footer>
    </article>

    <div class="article__related panel">
        <div class="article__related__inner panel__inner">

            <div class="post-grid post-grid--4x">
                <?php
                $post = get_queried_object();
                $recent_posts = get_posts(array(
                'orderby' => 'date',
                'order' => 'DESC',
                'showposts' => 3,
                'category' => get_the_category( array( $post->ID ) ),
                'exclude' => array( $post->ID )
                ));
                
                foreach($recent_posts as $recent_post) :
                    $cardtitle = $recent_post->post_title;
                    $cardid = $recent_post->ID;
                    $cardlink = get_permalink($cardid);
                    $cardthumb = get_the_post_thumbnail($cardid,'thumb');
                    ?>
                    <?php include( locate_template( 'includes/component-card.php' ) );  ?>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

</div>

<?php endwhile; 
endif; ?>





<?php get_footer(); ?>