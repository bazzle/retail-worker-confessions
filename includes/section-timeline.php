<?php
$timelinetitle = get_field('timeline_title');
$timelinebefore = get_field('timeline_before_content');
$timelineafter = get_field('timeline_after_content');
$timelineitems = get_field('timeline_items');
?>
<div class="timeline panel panel--doublepad">
    <?php if ($timelinebefore) : ?>
        <div class="panel__inner">
            <div class="timeline__beforeafter-copy">
                <?php echo $timelinebefore ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($timelinetitle) : ?>
        <div class="panel__inner">
            <h2 class="timeline__title"><?php echo $timelinetitle ?></h2>
        </div>
    <?php endif; ?>

    <div class="panel__inner">
    <div class="timeline__timeline">
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
            <div class="timeline__item__description">
                <?php echo $description ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    </div>

    <?php if ($timelineafter) : ?>
        <div class="panel__inner">
            <div class="timeline__beforeafter-copy timeline__beforeafter-copy--after">
                <?php echo $timelineafter ?>
            </div>
        </div>
    <?php endif; ?>

</div>