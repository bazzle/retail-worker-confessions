<div class="posts-list">
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
    if ($sc_atts['images'] == true) {
        $showimage = true;
    } else {
        $showimage = false;
    };
    if ($sc_atts['post_type'] != null){
        $posttype = $sc_atts['post_type'];
    } else {
        $posttype = 'post';
    }
    $recent_posts = get_posts(array(
    'orderby' => 'date',
    'order' => 'DESC',
    'showposts' => $numberofposts,
    'post_type' => $posttype,
    'category' => $category,
    'exclude' => $exclude
    ));
    
    foreach($recent_posts as $recent_post) :
        $itemid = $recent_post->ID;
        $excerpt = get_field('article_excerpt',$itemid);
        $itemlink = get_permalink($itemid);
        if ( $excerpt && $sc_atts['excerpt_as_title'] === 'true'){
            $itemtitle = $excerpt;
        } else {
            $itemtitle = $recent_post->post_title;
        }
        ?>
        <div class="posts-list__item">
        <?php include(locate_template('includes/component-post-list-item--basic.php')); ?>
        </div>
    <?php endforeach; ?>
</div>