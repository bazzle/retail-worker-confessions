<?php
if (empty($paneltitle)){
    $paneltitle = 'Title here';
};
if (empty($paneltitleLevel)){
    $paneltitleLevel = 2;
};
?>
<?php if ($paneltitle) : ?>
<div class="panel__title">
    <h<?php echo $paneltitleLevel ?>><?php echo $paneltitle ?></h<?php echo $paneltitleLevel ?>>
</div>
<?php endif; ?>