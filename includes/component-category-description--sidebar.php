<?php
$contributelink = get_site_url() . '/submit-your-article/';
if( $post->post_type == 'confessions'){
    $description = get_field('confession_description','option');
}elseif( $post->post_type == 'rants'){
    $description = get_field('rants_description','option');
}else{
    $thiscategoryid = get_the_category($post)[0]->term_id;
    $description = category_description($thiscategoryid);
}
?>

<?php if ($description) : ?>
<div class="sidebar__item">
    <div class="sidebar__item__content">
        
        <div class="sidebar-description">
            
            <p class="sidebar-description__contribute">
                <span class="sidebar-description__contribute__pre"><?php echo $description ?></span>
                <a class="sidebar-description__contribute__link" href="<?php echo $contributelink ?>">contribute</a>
            </p>
            
        </div>
        
    </div>
</div>
<?php endif; ?>