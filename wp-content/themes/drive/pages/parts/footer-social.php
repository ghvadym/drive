<?php
$fields = get_fields('options');
?>

<div class="footer-column col-md-4 col-lg-3">
    <?php if(!empty($fields['footer_social_links'])): ?>
        <div class="footer__social">
            <div class="social__title">
                <?php echo $fields['footer_social_title'] ?>
            </div>
            <?php foreach($fields['footer_social_links'] as $item): ?>
                <a href="<?php echo $item['link'] ?>"
                   class="social__img"
                   target="_blank">
                    <img src="<?php echo $item['img'] ?>"
                         alt="<?php echo $item['title'] ?>">
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>