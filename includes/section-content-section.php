<div class="content-section">
<?php
if( have_rows('content_section') ):
    while( have_rows('content_section') ) : the_row();
        $row_config = get_sub_field('configuration');
        $row_content = get_sub_field('content');
        $row_title = get_sub_field('title');
        $row_cta = get_sub_field('cta');
    ?>
    <div class="content-section__item">
        <?php if ($row_config['is_title'] == true) : ?>
            <div class="content-section__item__title">
                <h3 class="content-section__item__title__title"><?php echo $row_title ?></h3>
            </div>
        <?php endif; ?>
        <div class="content-section__item__content">
            <?php echo $row_content; ?>
        </div>
    </div>
    <?php endwhile;
endif; ?>
</div>