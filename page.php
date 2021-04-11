<?php get_header(); ?>

<?php if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

    <div class="article">
    <article>

        <header class="article__header panel">
            <div class="panel__inner">
                <h1 class="article__title"><?php the_title(); ?></h1>
            </div>
        </header>
        
        <div class="article__main panel">
            <div class="panel__inner article__main__inner">
                <div class="article__main-col main-col">
                    <div class="article__body">
                        <?php wpautop(the_content()); ?>
                    </div>
                    <?php $bodyExtra = get_field('bodyExtra'); ?>
                    <?php if ($bodyExtra) : ?>
                    <div class="article__misc">
                        <?php echo $bodyExtra; ?>
                    </div>
                    <?php endif; ?>
                    <?php include( locate_template( 'includes/section-content-section.php') );  ?>
                </div>
                <aside class="article__aside sidebar">
                    <?php get_template_part('includes/section', 'sidebar'); ?>
                </aside>
            </div>
        </div>

        <div class="timeline panel">
            <div class="timeline__inner panel__inner">
            <?php
                $obj = get_queried_object();
                $timelineitems = get_field('timeline_items');
                if ( $obj->ID === 171 && $timelineitems) :
                    foreach ($timelineitems as $item) :
                        $imagepath = $item['timeline_item']['image']['url'];
                        $imagealt = $item['timeline_item']['image']['alt'];
                        $title = $item['timeline_item']['title'];
                        $description = $item['timeline_item']['description'];
                    ?>
                    <div class="timeline__item">
                        <img class="timeline__item__image" src="<?php echo $imagepath ?>" alt="<?php echo $imagealt ?>" />
                        <h2 class="timeline__item__title"><?php echo $title ?></h2>
                        <div class="timeline__item__description">
                            <?php echo $description ?>
                        </div>
                    </div>
                    <?php echo $image; ?>
                    <?php endforeach; ?>
                <?php endif;
                ?>
            </div>
        </div>

    </article>
    </div>

<?php endwhile; 
endif; ?>


<?php get_footer(); ?>