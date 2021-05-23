<?php
    $authorbio = get_field('author_box', $authoridacf)['author_short_bio'];
    $twitter = get_field( 'author_box', $authoridacf)['author_twitter'];
    $instagram = get_field( 'author_box', $authoridacf)['author_instagram'];
?>


<div class="author-box">
    <a href="<?php echo $authorpagelink ?>" class="author-box__profile">
        <img class="author-box__profile__image" src="<?php echo $authorimage ?>" alt="Profile image of <?php echo $authorname ?>" class="author-box__profile__image">
    </a>
    <div class="author-box__about">
        <p class="author-box__section-title">
            About the author
        </p>
        <a href="<?php echo $authorpagelink ?>" class="author-box__author-name">
            <?php echo $authorname; ?>
        </a>
        <p class="author-box__description">
            <?php echo $authorbio ?>
        </p>
        <a class="author-box__link" href="<?php $authorpagelink ?>">Read more</a>
    </div>
</div>