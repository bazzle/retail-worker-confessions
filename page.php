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

    </article>
    </div>

<?php endwhile; 
endif; ?>


<?php get_footer(); ?>