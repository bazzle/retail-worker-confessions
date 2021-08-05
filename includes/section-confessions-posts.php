<?php
$confessionsettings = get_field('confession_settings',$post);
$itemid = $post->ID;
$thedate = get_the_time( 'F jS, Y' );
$authorid = $post->post_author;
$authoridacf = 'user_' . $authorid;
$itemexcerpt = get_field('confession_excerpt',$post);
$itemcontent = $post->post_content;
$votenumber = get_field('vote_number',$post);
if ($confessionsettings['user_submission'] === true){
    $authorname = get_field('confession_author_name');
} else {
    $authorname = get_field('author_box', $authoridacf)['author_name'];
}
if ($confessionsettings['long_submission'] === true){
    $itemcontent = $itemexcerpt;
} else {
    $itemcontent = $itemcontent;
}
$itemid = $post->ID;
$itemtitle = $post->post_title;
$itemlink = get_permalink($itemid);
?>


<div class="posts-list--stacked__item post-list-item-stacked">
    <h3 class="post-list-item-stacked__title">
        <a href="<?php echo $itemlink ?>"><?php echo $itemtitle; ?></a>
    </h3>
    <div class="post-list-item-stacked__top-row">
        <div class="post-list-item-stacked__meta">
            <span class="post-list-item-stacked__meta__item"><?php echo $authorname ?></span>
            <span class="post-list-item-stacked__meta__item"><?php echo $thedate ?></span>
        </div>
        <div class="post-list-item-stacked__upvote">
            <?php include( locate_template( 'includes/component-voting.php', false, false ) );  ?>
        </div>
    </div>
    <div class="post-list-item-stacked__content">
        <?php echo wpautop( $itemcontent ) ?>
    </div>
    <div class="post-list-item-stacked__footer">
        <a href="<?php echo $itemlink ?>" class="post-list-item-stacked__footer__read-more">Read more</a>
    </div>
</div>