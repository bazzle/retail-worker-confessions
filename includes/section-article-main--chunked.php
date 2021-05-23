<div class="article__leadin-section panel panel--nopad">
    <div class="panel__inner article__leadin-section__inner">
        <div class="article__leadin-section__main-col main-col">
            <div class="article__author">
                <?php include( locate_template( 'includes/component-author-badge.php', false, false ) );  ?>
            </div>
            <div class="article__date">
                <?php echo $thedate ?>
            </div>
            <div class="article__hero">
                <?php
                    $heroImage = get_field("article_hero_image");
                    $heroImageUrl = $heroImage['url'];
                    $heroImageAlt = $heroImage['alt'];
                    ?>
                <img class="article__hero__image" src="<?php echo $heroImageUrl ?>"
                    alt="<?php echo $heroImageAlt ?>">
            </div>
        </div>
        <div class="article__leadin-section__aside aside">
            <?php get_template_part('includes/section', 'sidebar'); ?>
        </div>
    </div>
</div>



<?php foreach($articlechunks as $chunk) :
    $content = $chunk['article_content_chunk'];
    $side = $chunk['article_chunk_side'];
    $footer = $chunk['article_chunk_footer'];
?>
<div class="article__chunk panel panel--nopad">
    <div class="panel__inner article__chunk__inner">
        <div class="article__chunk__main-col main-col">
            <div class="article__body">
                <?php echo $content ?>
            </div>
        </div>
        <?php if ($side) : ?>
        <aside class="article__chunk__aside sidebar">
            <?php echo $side ?>
        </aside>
        <?php endif; ?>
    </div>

    <?php if ($footer) : ?>
    <div class="article__chunk__footer panel">
        <div class="panel__inner">
            <?php echo $footer ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php endforeach; ?>