<div class="posts-list posts-list--flickity">
    <div class="flickity-carousel flickity-carousel--2x">
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
    )); ?>
    <?php foreach($recent_posts as $recent_post) :
        $itemid = $recent_post->ID;
        $cardtitle = $recent_post->post_title;
        $cardlink = get_permalink($itemid);
        $cardexcerpt = get_field('article_excerpt',$recent_post);
        $cardthumb = get_the_post_thumbnail($itemid,'thumb');
        ?>        
        <div class="posts-list__item">
            <?php include(locate_template('includes/component-card.php')); ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>