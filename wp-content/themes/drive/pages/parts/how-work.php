<?php
$fields = get_fields('options');
?>
<div class="how-works">
    <div class="how-works__row">
        <div class="how-works__col">
            <div class="how-works__content">
                <h2 class="how-works__title">
                    <?php echo $fields['how_works_title'] ?>
                </h2>
                <?php if(!empty($fields['how_works_benefits'])): ?>
                    <div class="how-works__list">
                        <?php foreach($fields['how_works_benefits'] as $item): ?>
                            <div class="how-works__item">
                                <div class="item-img">
                                    <img src="<?php echo $item['img'] ?>"
                                         alt="<?php echo $item['title'] ?>">
                                </div>
                                <div class="item-title">
                                    <?php echo $item['title'] ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="how-works__col">
            <div class="how-works__image">
                <picture>
                    <source srcset="<?php echo $fields['how_works_img_mob'] ?>" media="(max-width: 768px)">
                    <source srcset="<?php echo $fields['how_works_img'] ?>">
                    <img src="<?php echo $fields['how_works_img'] ?>" alt="My default image">
                </picture>
            </div>
        </div>
    </div>
</div>