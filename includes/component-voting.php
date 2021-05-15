
<div class="voting">
    <button class="voting__button" id="<?php echo $itemid ?>">Upvote!</button>
    <div class="voting__counter">
        <?php if ($votenumber){
            echo $votenumber;
        } else { 
            echo '1';
        } ?>
    </div>
</div>