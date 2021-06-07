<div class="card">
    <a href="<?php echo $cardlink ?>" class="card__image">
        <?php if ($cardthumb) echo $cardthumb; ?>
    </a>
    <div class="card__content">
        <a href="<?php echo $cardlink ?>" class="card__title">
            <?php echo $cardtitle; ?>
        </a>
        <?php if ($cardexcerpt) : ?>
            <p><?php echo $cardexcerpt; ?></p>
        <?php endif; ?>
        <a class="card__cta" href="<?php echo $cardlink ?>">Read more</a>
    </div>
</div>