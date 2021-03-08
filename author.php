<?php get_header(); ?>

<?php
    $theauthor = get_queried_object();
    $authorid = get_queried_object_id();
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




<article class="article">

    <header class="article__header panel">
        <div class="panel__inner">
            <h1 class="article__title"><?php echo $authorname ?></h1>
        </div>
    </header>

    <div class="article__main panel">
        <div class="panel__inner">
            <div class="article__main-col main-col">
                <div class="article__body">
                    <?php echo $authorbio; ?>
                </div>
                <?php $bodyExtra = get_field('bodyExtra'); ?>
                <?php if ($bodyExtra) : ?>
                <div class="article__misc">
                    <?php echo $bodyExtra; ?>
                </div>
                <?php endif; ?>
                <div class="post-list">
                    <h2>Content by <?php echo $name ?></h2>
                    <?php
                    query_posts(array(
                        'orderby' => 'date',
                        'order' => 'DESC' ,
                        'author' => get_queried_object_id(),
                        'showposts' => 5
                    ));
                    if (have_posts()) : ?>
                    <ul class="post-list__list">
                        <?php while (have_posts()) : the_post() ?>
                        <?php $intro = get_field( "intro" ); ?>
                        <li class="post-list__item">
                            <h3 class="post-list__item__title">
                                <a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a>
                            </h3>
                            <?php if($intro) : ?>
                            <p class="post-list__item__description">
                                <?php echo $intro ?>
                            </p>
                            <?php endif; ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    <p>No posts</p>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>


            
        </div>
    </div>

</article>

<?php get_footer(); ?>