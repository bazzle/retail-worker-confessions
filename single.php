<?php get_header(); ?>

<?php
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

<?php
    $category = get_the_category();
    $authorid = get_the_author_meta('ID');
    $authoridacf = 'user_' . $authorid;
    $authorname = get_field('author_box', $authoridacf)['author_name'];
    $authoremail = get_field('author_box', $authoridacf)['author_email'];
    $authorimage = get_field('author_box', $authoridacf)['author_image'];
    $authorgravatar = get_avatar_url($authoremail);
    $authorbio = get_field('author_box', $authoridacf)['author_short_bio'];
    $authorpagelink = get_author_posts_url($authorid);
    $twitter = get_field( 'author_box', $authoridacf)['author_twitter'];
    $instagram = get_field( 'author_box', $authoridacf)['author_instagram'];
    $thedate = get_the_date();
    $articleformat = get_field('article_format');
    $articlechunks = get_field('article_content');
    if (empty($authorimage)){
        $authorimage = $authorgravatar;
    };
?>

<div class="article">
    <article>

        <header class="article__header panel">
            <div class="panel__inner">
                <div class="article__cats">
                    <?php foreach ($category as $cat) :
                        $catname = $cat->name;
                        $catlink = get_category_link($cat);
                    ?>
                    <a href="<?php echo $catlink ?>" class="article__cats__cat">
                        <span><?php echo $catname ?></span>
                    </a>
                    <?php endforeach ?>
                </div>
                <div class="article__header__cat-description-mobile">
                    <?php include( locate_template('includes/component-category-description--mobile.php' ) ); ?>
                </div>
                <h1 class="article__header__title"><?php the_title(); ?></h1>
            </div>
        </header>

        <div class="article__main">
        
            
            <?php if ($articleformat === 'chunked') : ?>
                <?php include( locate_template( 'includes/section-article-main--chunked.php', false, false ) );  ?>
            <?php elseif ($articleformat === 'standard') : ?>
                <?php include( locate_template( 'includes/section-article-main--standard.php', false, false ) );  ?>
            <?php endif; ?>

            <footer class="article__footer panel">
                <div class="panel__inner">
                    <?php include( locate_template( 'includes/component-author.php', false, false ) );  ?>
                </div>
            </footer>

        </div><!-- end article main -->


    </article>
</div>


<?php endwhile;
endif; ?>

<?php if ($category[0]->category_count > 2) : ?>

<div class="article__related">
    <?php include( locate_template( 'includes/component-related-articles.php', false, false ) );  ?>
</div>

<?php endif; ?>





<?php get_footer(); ?>