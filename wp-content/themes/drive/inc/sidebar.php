<?php

add_action('widgets_init', 'custom_sidebar');
function custom_sidebar()
{
    register_my_sidebar('Footer nav 1', 'footer-nav-1');
    register_my_sidebar('Footer nav 2', 'footer-nav-2');
    register_my_sidebar('Footer nav 3', 'footer-nav-3');
}

function register_my_sidebar($title, $slug)
{
    register_sidebar([
        'name'          => $title,
        'id'            => $slug,
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div class="footer-column col-md-4 col-lg-3">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h2 class="widget__title">',
        'after_title'   => "</h2>\n",
    ]);
}