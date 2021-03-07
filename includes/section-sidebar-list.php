<div class="sidebar-list">
    <?php
    if ($sc_atts['number_of_posts'] == "all"){
        $numberofposts = -1;
    } else {
        $numberofposts = $sc_atts['number_of_posts'];
    };
    if ($sc_atts['category'] == "all"){
        $category = 0;
    } else {
        $category = $sc_atts['category'];
    };
    $recent_posts = get_posts(array(
    'orderby' => 'date',
    'order' => 'DESC',
    'showposts' => $numberofposts,
    'category' => $category
    ));
    
    foreach($recent_posts as $recent_post) :
        $itemtitle = $recent_post->post_title;
        $itemid = $recent_post->ID;
        $itemlink = get_permalink($itemid);
        $itemthumb = get_the_post_thumbnail($itemid,'tiny');
        ?>
        <?php if ($sc_atts['image'] == "yes") : ?>
            <a href="<?php echo $itemlink ?>" class="sidebar-list__item sidebar-list__item--image">
                <div class="sidebar-list__item__image">
                    <?php echo $itemthumb; ?>
                </div>
                <span class="sidebar-list__item__title">
                    <?php echo $itemtitle; ?>
                </span>
            </a>
        <?php else : ?>
            <a href="<?php echo $itemlink ?>" class="sidebar-list__item sidebar-list__item--noimage">
                <span class="sidebar-list__item__title">
                    <?php echo $itemtitle; ?>
                </span>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
    

</div>