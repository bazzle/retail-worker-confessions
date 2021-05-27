<?php get_header(); ?>

<?php if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

<div class="page">

    <?php get_template_part('includes/section','page-head'); ?>

        
        <div class="page__main panel">
            <div class="panel__inner page__main__inner">
                <div class="page__main-col main-col main-col--nomin-height">
                    <div class="page__body">
                        <?php wpautop(the_content()); ?>
                    </div>
                    <?php $bodyExtra = get_field('bodyExtra'); ?>
                    <?php if ($bodyExtra) : ?>
                    <div class="page__misc">
                        <?php echo $bodyExtra; ?>
                    </div>
                    <?php endif; ?>
                    <?php if( have_rows('content_section') ): ?>
                        <?php include( locate_template( 'includes/section-content-section.php') );  ?>
                    <?php endif; ?>
                </div>
                <aside class="page__aside sidebar">
                    <?php get_template_part('includes/section', 'sidebar'); ?>
                </aside>
            </div>
        </div>


        <?php $timelineitems = get_field('timeline_items');
        if ($timelineitems) : ?>
                <?php get_template_part('includes/section','timeline'); ?>
        <?php endif; ?>
        
        
    </div>

<?php endwhile; 
endif; ?>


<?php get_footer(); ?>