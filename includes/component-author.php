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

<div class="author-box">
    <a href="<?php echo $authorpagelink ?>" class="author-box__profile">
        <img class="author-box__profile__image" src="<?php echo $authorimage ?>" alt="Profile image of <?php echo $authorname ?>" class="author-box__profile__image">
    </a>
    <div class="author-box__about">
        <p class="author-box__section-title">
            About the author
        </p>
        <p class="author-box__author-name">
            <?php echo $authorname; ?>
        </p>
        <p class="author-box__about__description">
            <?php echo $authorbio ?>
        </p>
    </div>
</div>