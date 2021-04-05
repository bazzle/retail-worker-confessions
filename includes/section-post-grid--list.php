<div class="posts-list">
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
        <?php if ($sc_atts['image'] == true) : ?>
            <?php include(locate_template('includes/component-post-list-item--image.php')); ?>
        <?php else : ?>
            <?php include(locate_template('includes/component-post-list-item--noimage.php')); ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>