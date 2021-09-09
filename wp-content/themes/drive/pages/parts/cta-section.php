<?php
$fields = get_fields('options');
?>

<div class="cta" style="<?php echo getAcfImage($fields['cta_bg']) ?>">
    <div class="container">
        <div class="cta__wrap">
            <div class="cta__title title">
                <?php echo $fields['cta_title'] ?>
            </div>
            <div class="cta__subtitle">
                <?php echo $fields['cta_subtitle'] ?>
            </div>
            <div class="cta__btn">
                <?php echo getAcfBtn($fields['cta_btn'], 'btn') ?>
            </div>
        </div>
    </div>
</div>