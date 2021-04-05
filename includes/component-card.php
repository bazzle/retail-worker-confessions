<div class="card">
    <?php if ($cardthumb) : ?>
    <a href="<?php echo $cardlink ?>" class="card__image">
        <?php echo $cardthumb; ?>
    </a>
    <?php endif; ?>
    <div class="card__content">
        <a href="<?php echo $cardlink ?>" class="card__title">
            <?php echo $cardtitle; ?>
        </a>
        <?php if ($cardexcerpt) : ?>
            <?php echo $cardexcerpt; ?>
        <?php endif; ?>
    </div>
</div>