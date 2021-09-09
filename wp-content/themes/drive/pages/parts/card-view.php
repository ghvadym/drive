<?php

$fields = get_fields($car->ID);
$fieldNames = [
    'car_door'  => ' døre',
    'car_seats' => ' personers',
    'car_kml'   => ' km/l',
    'car_hk'    => ' hk',
    'car_trans' => '',
    'car_fuel'  => '',
];
?>

<div class="auto-view__info_wrap">
    <div class="auto-view__image">
        <img src="<?php echo get_the_post_thumbnail_url($car); ?>" alt="top-image-car">
    </div>
    <div class="auto-view__head">
        <div class="auto-view__price_title">
            <?php _e('Pris', 'drive') ?>
        </div>
        <div class="auto-view__price">
            <?php echo $fields['car_price'] . '<span class="price-unit">kr./md</span>' ?>
        </div>
        <div class="auto-view__title">
            <?php echo $car->post_title ?>
        </div>
    </div>

    <ul class="auto-view__list">
        <?php foreach ($fieldNames as $key => $val):
            if ($fields[$key]): ?>
                <li class="list-item">
                    <?php echo $fields[$key] . $val ?? '' ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <div class="auto-view__btn">
        <a href="<?php echo get_post_permalink($car->ID) ?>" class="btn">
            <?php _e('Bestil nu', 'GMK') ?>
        </a>
    </div>
</div>
