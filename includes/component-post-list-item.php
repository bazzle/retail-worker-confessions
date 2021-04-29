<div class="post-list-item">
    <?php if ($itemtitle) : ?>
    <h3 class="post-list-item__title">
        <a href="<?php echo $itemlink ?>"><?php echo $itemtitle; ?></a>
    </h3>
    <?php endif; ?>
    <?php if ($itemexcerpt) : ?>
    <p class="post-list-item__excerpt">
        <?php echo $itemexcerpt; ?>
    </p>
    <?php endif; ?>
</div>