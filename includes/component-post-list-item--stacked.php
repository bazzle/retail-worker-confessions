<div class="posts-list--stacked__item post-list-item-stacked">
    <h3 class="post-list-item-stacked__title">
        <a href="<?php echo $itemlink ?>"><?php echo $itemtitle; ?></a>
    </h3>
    <div class="post-list-item-stacked__meta">
        <span class="post-list-item-stacked__meta__item"><?php echo $authorname ?></span>
        <span class="post-list-item-stacked__meta__item"><?php echo $itemdate ?></span>
    </div>
    <div class="post-list-item-stacked__content">
        <?php echo wpautop( $itemcontent ) ?>
    </div>
</div>