<?php get_header(); ?>
    <div class="news-feed">
        <?php 
            if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>
                <div class="news-item">
                    <h2 class="new-item__title">
                        <?php the_title(); ?>
                    </h2>
                    <div class="news-item__excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile; 
            endif; 
        ?>
    </div>
<?php get_footer(); ?>