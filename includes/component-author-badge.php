<div class="author-badge">
    <div class="author-badge__image">
        <?php if ($confessionsettings['user_submission'] === true) : ?>
            <svg class="author-badge__image__svg">
                <use xlink:href="<?php echo get_template_directory_uri() ?>/build/svg/icons.svg#icon-profile" />
            </svg>
        <?php else : ?>
            <img class="author-badge__image__image" src="<?php echo $authorimage ?>" alt="Profile image of <?php echo $itemauthor ?>">
        <?php endif; ?>
    </div>
    <a class="author-badge__name" href="<?php echo $authorpagelink ?>">
        <?php echo $itemauthor ?>
    </a>
</div>