<?php
$contributelink = get_site_url() . '/submit-your-article/';
$cta = " Interested in sharing your story? <a href='" . $contributelink . "'>Contribute</a>";
if( $post->post_type == 'confessions'){
    $description = get_field('confession_description','option');
    echo $description . $cta;
}elseif( $post->post_type == 'rants'){
    $description = get_field('rants_description','option');
    echo $description . $cta;
}else{
    $thiscategoryid = get_the_category($post)[0]->term_id;
    $description = category_description($thiscategoryid);
    echo $description;
}