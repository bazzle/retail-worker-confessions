<?php
if( $post->post_type == 'confessions'){
    $description = get_field('confession_description','option');
    echo $description;
}elseif( $post->post_type == 'rants'){
    $description = get_field('rants_description','option');
    echo $description;
}else{
    $thiscategoryid = get_the_category($post)[0]->term_id;
    $description = category_description($thiscategoryid);
    echo $description;
}