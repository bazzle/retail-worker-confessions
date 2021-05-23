<div class="card">
    <a href="<?php echo $cardlink ?>" class="card__image">
        <?php if ($cardthumb) echo $cardthumb; ?>
    </a>
    <div class="card__content">
        <a href="<?php echo $cardlink ?>" class="card__title">
            <?php echo $cardtitle; ?>
        </a>
        <?php if ($cardexcerpt) : ?>
            <?php echo $cardexcerpt; ?>
        <?php endif; ?>
    </div>
</div>