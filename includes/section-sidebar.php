<?php if ( is_single() ) : ?>

<?php
$thispostcat = get_the_category();
$thispostcatid = $thispostcat[0]->term_id;
$catfields = get_fields('term_' . $thispostcatid);
$catfielditem = get_field('category_sidebar', 'term_' . $thispostcatid);
?>

<?php if ($catfielditem) :
    foreach ($catfielditem as $item) :
    $thisblock = $item['block_sidebar_item'];
    $row_config = $thisblock['configuration'];
    $row_content = $thisblock['content'];
    $row_title = $thisblock['title'];
?>
    <div class="sidebar__item">
        <?php if ($row_config['is_title'] == true) : ?>
            <div class="sidebar__item__title">
                <h3 class="sidebar__item__title__title">
                    <?php echo $row_title; ?>
                </h3>
            </div>
        <?php endif; ?>
        <div class="sidebar__item__content">
            <?php echo $row_content; ?>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>
<?php endif; ?>


<?php $sidebaritem = get_field('sidebar'); ?>

<?php if ($sidebaritem) : ?>
    <?php
        foreach ($sidebaritem as $item) :
        $thisblock = $item['block_sidebar_item'];
        $row_config = $thisblock['configuration'];
        $row_content = $thisblock['content'];
        $row_title = $thisblock['title'];
    ?>
    <div class="sidebar__item">
        <?php if ($row_config['is_title'] == true) : ?>
            <div class="sidebar__item__title">
                <h3 class="sidebar__item__title__title">
                    <?php echo $row_title; ?>
                </h3>
            </div>
        <?php endif; ?>
        <div class="sidebar__item__content">
            <?php echo $row_content; ?>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>