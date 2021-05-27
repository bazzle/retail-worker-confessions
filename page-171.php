<?php get_header(); ?>
    <div class="page">

    <?php get_template_part('includes/section','page-head'); ?>

    <?php $timelineitems = get_field('timeline_items');
    if ($timelineitems) : ?>
            <?php get_template_part('includes/section','timeline'); ?>
    <?php endif; ?>


</div>
<?php get_footer(); ?>