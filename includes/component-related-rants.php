


<div class="related-rants panel">
    <div class="related-rants__inner panel__inner">
        <div class="related-rants__title">
            <h2 class="related-rants__title__title">More Rants</h2>
        </div>

        <div class="posts-list">
            <?php
            $recent_posts = get_posts(array(
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 20,
            'post_type' => 'rants',
            'exclude' => $itemid
            ));

            if ( count($recent_posts) === 0){
                echo 'More coming soon';
            }
            
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


    </div>
</div>