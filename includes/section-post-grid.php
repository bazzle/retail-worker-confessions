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
    'posts_per_page' => $numberofposts,
    'category' => $category
    ));
    
    foreach($recent_posts as $recent_post) :
        $cardtitle = $recent_post->post_title;
        $cardid = $recent_post->ID;
        $cardlink = get_permalink($cardid);
        $cardthumb = get_the_post_thumbnail($cardid,'thumb');
        ?>
        <?php include( locate_template( 'includes/component-card.php' ) );  ?>
    <?php endforeach; ?>
</div>