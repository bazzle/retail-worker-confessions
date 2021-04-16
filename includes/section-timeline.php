<?php
$timelinetitle = get_field('timeline_title');
$timelineitems = get_field('timeline_items');
?>
<div class="timeline panel panel--doublepad panel--nopad-top">
    <div class="panel__inner">
    <?php if ($timelinetitle) : ?>
        <h2 class="timeline__title"><?php echo $timelinetitle ?></h2>
    <?php endif; ?>
    <?php
    foreach ($timelineitems as $item) :
        $imagepath = $item['timeline_item']['image']['url'];
        $imagealt = $item['timeline_item']['image']['alt'];
        $title = $item['timeline_item']['title'];
        $description = $item['timeline_item']['description'];
        $date = $item['timeline_item']['date'];
    ?>
    <div class="timeline__item">
        <div class="timeline__item__line"></div>
        <div class="timeline__item__card">
            <img class="timeline__item__image" src="<?php echo $imagepath ?>" alt="<?php echo $imagealt ?>" />
            <h2 class="timeline__item__title">
                <span class="timeline__item__date"><?php echo $date ?></span>
                <span class="timeline__item__title__title"><?php echo $title ?></span>
            </h2>
            <p class="timeline__item__description">
                <?php echo $description ?>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
</div>