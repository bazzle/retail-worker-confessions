<?php get_header(); ?>

<?php
    $theauthor = get_queried_object();
    $theauthorid = get_queried_object_id();
    $name = esc_html(get_the_author_meta('display_name', $theauthorid));
    $description = esc_html(get_the_author_meta('description', $theauthorid));
?>

    <article class="article page-info">
        <?php if ($description) : ?>
            <div class="panel">
                <div class="panel__inner-narrow">
                    <h1 class="page-info__title">
                        <?php echo $name ?>
                    </h1>
                    <p class="article__intro"><?php echo $description ?></p>
                </div>
            </div>
        <?php endif; ?>
            <div class="panel page-info__main">
                <div class="panel__inner-narrow">
                    <div class="panel__title">
                        <h2>Content by <?php echo $name ?></h2>
                    </div>

                    <div class="post-list">
                        <?php
                        query_posts(array(
                            'orderby' => 'date',
                            'order' => 'DESC' ,
                            'author' => get_queried_object_id(),
                            'post_type' => array('guide_posts', 'blog'),
                            'showposts' => 5
                        ));
                        if (have_posts()) : ?>
                            <ul class="post-list__list">
                            <?php while (have_posts()) : the_post() ?>
                                <?php $intro = get_field( "intro" ); ?>
                                <li class="post-list__item">
                                    <h3 class="post-list__item__title">
                                        <a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a>
                                    </h3>
                                    <?php if($intro) : ?>
                                        <p class="post-list__item__description">
                                            <?php echo $intro ?>
                                        </p>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        <?php else : ?>
                        <p>No posts</p>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>




                </div>
            </div>
    </article>


<?php get_footer(); ?>