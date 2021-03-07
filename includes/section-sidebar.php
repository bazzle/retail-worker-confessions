<div class="sidebar">
    <?php if( have_rows('sidebar_item') ):
    while( have_rows('sidebar_item') ) : the_row();
        $row_config = get_sub_field('configuration');
        $row_content = get_sub_field('content');
        $row_title = get_sub_field('title');
        $row_cta = get_sub_field('cta'); ?>
        <div class="sidebar__item">
            <?php if ($row_config['is_title'] == true) : ?>
                <div class="sidebar__item__title">
                    <h3 class="sidebar__item__title__title"><?php echo $row_title ?></h3>
                </div>
            <?php endif; ?>
            <div class="sidebar__item__content">
                <?php echo $row_content; ?>
            </div>
        </div>
        <?php
    endwhile;
    endif; ?>
</div>