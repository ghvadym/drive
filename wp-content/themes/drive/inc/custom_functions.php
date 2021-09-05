<?php

if (!function_exists('dd')) {
    function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }
}

function get_template_part_var($template, $data = [])
{
    extract($data);
    require locate_template($template . '.php');
}

function wp_get_current_url()
{
    return home_url($_SERVER['REQUEST_URI']);
}

function getImage($name) : string
{
    return get_template_directory_uri() . '/assets/img/' . $name;
}

function getBgImage($name) : string
{
    $image = getImage($name);
    return 'background-image: url(' . $image . ')';
}

function getAcfImage($field): string
{
    return 'background-image: url(' . $field . ')';
}

function getAcfBtn($field, $class)
{
    return '<a class="'. $class .'" href="'. $field['url'] .'" target="'. $field['target'] .'">'. $field['title'] .'</a>';
}

function textLimiter($text, $limit = 40): string
{
    $plainText = strip_tags($text);
    return strlen($plainText) > $limit ? mb_strimwidth($plainText, 0, $limit, "...") : $plainText;
}

function footerWidgets()
{
    $widgets = [
        'footer-nav-1',
        'footer-nav-2',
        'footer-nav-3',
    ];
    foreach ($widgets as $widget) {
        if (is_active_sidebar($widget)) {
            dynamic_sidebar($widget);
        }
    }
}

function getInfoCar($car)
{
    $fields = get_fields($car->ID);
    $fieldNames = [
        'car_price',
        'car_door',
        'car_seats',
        'car_kml',
        'car_hk',
        'car_trans',
        'car_fuel'
    ];
    ?>

    <div class="auto-view__info_wrap">
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
            <?php
            foreach($fieldNames as $field):
                if($fields[$field]): ?>
                    <li class="list-item">
                        <?php echo $fields[$field] ?>
                    </li>
                <?php endif; ?>
            <?php
            endforeach; ?>
        </ul>

    </div>

    <?php
}