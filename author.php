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
    $authorlongbio = get_field('author_box', $authoridacf)['author_long_bio'];
    $authorpagelink = get_author_posts_url($authorid);
    $twitter = get_field( 'author_box', $authoridacf)['author_twitter'];
    $instagram = get_field( 'author_box', $authoridacf)['author_instagram'];
    if (empty($authorimage)){
        $authorimage = $authorgravatar;
    };
?>




<article class="page author">

    <header class="page__header panel">
        <div class="panel__inner">
            <div class="page__header__main">
                <h1 class="page__header__title"><?php echo $authorname; ?></h1>
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
    

    <div class="page__main panel panel--doublepad">
    
        <div class="panel__inner">
            <div class="main-col page__main-col">
                <div class="page__body">
                    <?php echo $authorlongbio; ?>
                </div>
                
                <div class="post-list">
                    <h2 class="author__section-title">Content by <?php echo $authorname ?></h2>
                    <?php
                    query_posts(array(
                        'orderby' => 'date',
                        'order' => 'DESC' ,
                        'author' => get_queried_object_id(),
                        'posts_per_page' => 5,
                        'post_type' => 'any'
                    ));
                    if (have_posts()) : ?>
                    <div class="posts-list">
                        <?php while (have_posts()) : the_post() ?>
                        <div class="posts-list__item">
                            <?php
                                $itemtitle = get_the_title();
                                $itemlink = get_permalink();
                                $objid = get_queried_object_id();
                                if ($post->post_type === 'post'){
                                    $itemexcerpt = get_the_excerpt();
                                } elseif ($post->post_type === 'confessions'){
                                    $itemexcerpt = get_the_excerpt();
                                } elseif ($post->post_type === 'rants'){
                                    $itemexcerpt = get_the_excerpt();
                                }
                            ?>
                            <?php include(locate_template('includes/component-post-list-item.php')); ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php else : ?>
                    <p>No posts yet</p>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
            <div class="page__aside sidebar">
                
                <div class="sidebar__item">
                    <div class="sidebar__item__content">
                        <div class="author__profile-info">
                            <div class="author__profile-info__image">
                                <img src="<?php echo $authorimage ?>" alt="Profile pic" class="author__profile-info__image">
                            </div>
                            <div class="author__profile-info__socials">
                                <a href="https://twitter.com/bazzle" class="author__profile-info__socials__item">
                                    <svg class="author__profile-info__socials__item__icon">
                                        <title>Facebook icon</title>
                                        <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/build/svg/icons.svg#share-facebook" />
                                    </svg>
                                    <span class="author__profile-info__socials__item__label">Facebook</span>
                                </a>
                                <a href="https://twitter.com/bazzle" class="author__profile-info__socials__item">
                                    <svg class="author__profile-info__socials__item__icon">
                                        <title>Facebook icon</title>
                                        <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/build/svg/icons.svg#share-twitter" />
                                    </svg>
                                    <span class="author__profile-info__socials__item__label">Twitter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        
    </div>

</article>

<?php get_footer(); ?>