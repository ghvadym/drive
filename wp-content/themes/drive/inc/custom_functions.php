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

}

function getCarsCategories()
{
    $args = [
        'post_type'      => 'car',
        'post_status'    => 'publish',
        'meta_key'       => 'car_widget',
        'orderby'        => 'menu_order',
        'order'          => 'desc',
    ];
    $posts = get_posts($args);
    if ($posts): ?>
        <div class="categories">
            <div class="container">
                <div class="categories__wrap">
                    <div class="categories__title">
                        <div class="title__part">
                            <?php _e('Vælg imellem', 'drive') ?>
                        </div>
                        <div class="title__part">
                            <?php echo count($posts) ?>
                        </div>
                        <div class="title__part">
                            <?php _e('kategorier', 'drive') ?>
                        </div>
                    </div>
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