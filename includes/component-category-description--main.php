<?php
$contributelink = get_site_url() . '/submit-your-article/';
if( $post->post_type == 'confessions'){
    $description = get_field('confession_description','option');
    $cta = 'Interested in sharing your confession?' . " " . "<a href='" . $contributelink . "'>Contribute</a>";
}elseif( $post->post_type == 'rants'){
    $description = get_field('rants_description','option');
    $cta = 'Interested in sharing your rant?' . " " . "<a href='" . $contributelink . "'>Contribute</a>";
}else{
    $thiscategoryid = get_the_category($post)[0]->term_id;
    $description = category_description($thiscategoryid);
}
echo '<p>';
echo $description ?? $description;
echo $cta ?? $cta;
echo '</p>';