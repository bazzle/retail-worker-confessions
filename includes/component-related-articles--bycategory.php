<div class="related-articles component-dark panel">
    <div class="related-articles__inner panel__inner">
        <div class="related-articles__title">
            <h2 class="related-articles__title__title">Related Articles</h2>
        </div>
        <div class="posts-list posts-list--flickity">
            <div class="flickity-carousel flickity-carousel--3x">
                <?php
                $thispostid = $post->ID;
                $thiscategory = get_the_category($post);
                $thiscategoryid = $thiscategory[0]->term_id;
                $related_posts = get_posts(array(
                    'posts_per_page' => 3,
                    'category' => $thiscategoryid,
                    'exclude' => $thispostid
                ));
                $related_posts_count = count($related_posts);
                if ($related_posts_count === 4 or $related_posts_count === 5){
                    $related_posts = array_slice($related_posts, 0, 3);
                }
            ?>

                <?php foreach($related_posts as $related_post) :
                $itemid = $related_post->ID;
                $cardtitle = $related_post->post_title;
                $cardlink = get_permalink($itemid);
                $cardexcerpt = get_field('article_excerpt',$related_post);
                $cardthumb = get_the_post_thumbnail($itemid,'thumb');
                ?>
                <div class="posts-list__item">
                    <?php include(locate_template('includes/component-card.php')); ?>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>


</div>