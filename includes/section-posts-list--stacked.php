<div class="posts-list posts-list--stacked">
    <?php
    $exclude = $sc_atts['exclude'];
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
        'category' => $category,
        'exclude' => $exclude
    ));
    
    foreach($recent_posts as $recent_post) :
        $itemid = $recent_post->ID;
        $itemtitle = $recent_post->post_title;
        $itemlink = get_permalink($itemid);
        $itemexcerpt = get_field('article_excerpt',$recent_post);
        ?>
        <div class="posts-list__item">
        <?php include(locate_template('includes/component-post-list-item.php')); ?>
        </div>
    <?php endforeach; ?>
</div>