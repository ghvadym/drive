<?php

add_action('widgets_init', 'custom_sidebar');
function custom_sidebar()
{
    register_my_sidebar('Footer navigation', 'footer-nav');
}

function register_my_sidebar($title, $slug)
{
    register_sidebar([
        'name'          => $title,
        'id'            => $slug,
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div class="footer-column col-md-6 col-lg-4">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h2 class="widget__title">',
        'after_title'   => "</h2>\n",
    ]);
}