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

function getImage($name): string
{
    return get_template_directory_uri() . '/assets/img/' . $name;
}

function getBgImage($name): string
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
    return '<a class="' . $class . '" href="' . $field['url'] . '" target="' . $field['target'] . '">' . $field['title'] . '</a>';
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

    <?php
}

function getCarsCategories()
{
    $args = [
        'post_type'      => 'car',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'meta_key'       => 'car_widget',
        'orderby'        => 'menu_order',
        'order'          => 'desc',
    ];
    $posts = get_posts($args);
    if ($posts): ?>
        <div class="categories">
            <div class="container">
                <div class="categories__wrap">
                    <div class="categories__list">
                        <?php
                        $iteration = 1;
                        foreach ($posts as $post): setup_postdata($post);
                            get_template_part_var('pages/parts/card-category', ['post' => $post, 'iteration' => $iteration]);
                            $iteration++;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;
    wp_reset_postdata();
}