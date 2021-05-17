<?php $thispost = get_queried_object() ?>
<div class="sidebar-description">
    <div class="sidebar-description__description">
        <p>
            <?php if( $thispost->post_type == 'confessions' ){
                echo get_field('confession_description','option');
            } else {
                $thiscategoryid = get_the_category($thispost)[0]->term_id;
                echo category_description($thiscategoryid);
            }
            ?>
        </p>
    </div>
</div>