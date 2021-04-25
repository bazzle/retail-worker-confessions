<?php get_header(); ?>
<?php
    $headerimage = get_field('header_image');
    $title = get_the_title();
    $excerpt = get_the_excerpt();
    ?>
<div class="page">
    <header class="page__header panel">
        <div class="panel__inner">
            <div class="page__header__main">
                <h1 class="page__header__title"><?php echo $title; ?></h1>
                <div class="page__header__excerpt"><?php echo $excerpt; ?></div>
            </div>
            <?php if ($headerimage) : ?>
            <div class="page__header__side">
                <div class="page__header__image">
                    <img src="<?php echo $headerimage['url'] ?>" alt="<?php echo $headerimage['alt'] ?>" />
                </div>
            </div>
            <?php endif; ?>
        </div>
    </header>

    <?php $timelineitems = get_field('timeline_items');
    if ($timelineitems) : ?>
            <?php get_template_part('includes/section','timeline'); ?>
    <?php endif; ?>


</div>
<?php get_footer(); ?>