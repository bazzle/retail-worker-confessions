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
    if ($sc_atts['post_type'] === null){
        $posttype = 'post';
    } else {
        $posttype = $sc_atts['post_type'];
    };


    $args = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $numberofposts,
        'post_type' => $posttype,
        'category' => $category,
        'exclude' => $exclude,
        'tax_query' => array(
            array(
                'taxonomy' => 'global_categories',
                'terms' => 'featured'
            ),
        ),
    );

    $recent_posts = get_posts($args); ?>

    <?php foreach($recent_posts as $recent_post) :
        $itemid = $recent_post->ID;
        $cardtitle = $recent_post->post_title;
        $cardlink = get_permalink($itemid);
        $cardthumb = get_the_post_thumbnail($itemid,'thumb');
        if ($sc_atts['post_type'] == 'confessions'){
            $cardexcerpt = get_field('confession_short_excerpt',$recent_post);
        } elseif ($sc_atts['post_type'] == 'rants'){
            $cardexcerpt = get_field('rant_short_excerpt',$recent_post);
        } else {
            $cardexcerpt = get_field('article_excerpt',$recent_post);
        }
        ?>
        <div class="posts-list__item">
            <?php include(locate_template('includes/component-card.php')); ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>