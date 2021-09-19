<?php $thisobj = get_queried_object(); ?>



<?php if ( is_singular('confessions') ) : ?>

    <?php
    include( locate_template('includes/component-category-description--sidebar.php' ) );
    $catfielditem = get_field('confessions_sidebar', 'option');
    if ($catfielditem) :
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
        <?php endforeach;
    endif; ?>




<?php elseif ( is_singular('rants') ) : ?>

    <?php
    include( locate_template('includes/component-category-description--sidebar.php' ) );
    $catfielditem = get_field('rants_sidebar', 'option');
    if ($catfielditem) :
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
    <?php endforeach;
    endif; ?>




<?php elseif ( is_single() ) : ?>


<!-- IF SINGLE POST -------------------------------------------->

    <?php
     include( locate_template('component-category-description--sidebar.php' ) );
    if($post->post_type === 'confessions'){
        $catfielditem = get_field('confessions_sidebar', 'option');
    } elseif($post->post_type === 'rants') {
        $catfielditem = get_field('rants_sidebar', 'option');
    } else {
        $thispostcat = get_the_category();
        $thispostcatid = $thispostcat[0]->term_id;
        $catfields = get_fields('term_' . $thispostcatid);
        $catfielditem = get_field('category_sidebar', 'term_' . $thispostcatid);
        $articleformat = get_field('article_format');
        $articlechunks = get_field('article_content');
    }
    ?>
    
    <?php if ($articleformat === 'standard' and $catfielditem) :
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


<?php elseif( is_category() ) : ?>



<!-- IF CATEGORY ARCHIVE -------------------------------------------->


    <?php
    include( locate_template('includes/component-sidebar-contribute.php' ) );
    $catfielditem = get_field('category_sidebar',$thisobj);
    if ($catfielditem) :
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



<?php elseif ( is_post_type_archive() ) : ?>



<!-- IF CUSTOM POST TYPE ARCHIVE -------------------------------------------->

    <?php
    include( locate_template('includes/component-sidebar-contribute.php' ) );
    if ($thisobj->name === 'confessions') {
        $catfielditem = get_field('confessions_sidebar', 'option');
    } elseif ($thisobj->name === 'rants') {
        $catfielditem = get_field('rants_sidebar', 'option');
    };
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


<?php elseif ( is_page() ) : ?>



<!-- IF PAGE -------------------------------------------->


    <?php
    $catfielditem = get_field('sidebar');
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