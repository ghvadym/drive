<?php

function archive_pagination()
{
    $postsPerPage = get_option('posts_per_page');
    $page = $_POST['page'] ?? '';
    $postType = $_POST['post'] ?? ['newspapers', 'magazines'];
    $offset = $page * $postsPerPage - $postsPerPage;
    $args = [
        'post_status'    => 'publish',
        'posts_per_page' => $postsPerPage,
        'post_type'      => $postType,
        'offset'         => $offset,
    ];

    $termsString = $_POST['terms'] ?? '';
    $termsArray = explode(',', $termsString);
    $taxQuery = [];

    foreach ($termsArray as $term) {
        $tax = get_term($term);
        $taxQuery[] = [
            'taxonomy' => $tax->taxonomy,
            'field'    => 'id',
            'terms'    => $term,
        ];
    }

    if (!empty($termsString)) {
        $args['tax_query'] = $taxQuery;
    }

    queryAjax($args);
}

function archive_filter()
{
    $termsString = $_POST['filter_data'] ?? '';
    $termsArray = explode(',', $termsString);
    $taxQuery = [];

    $args = [
        'post_status'    => 'publish',
        'posts_per_page' => get_option('posts_per_page'),
        'post_type'      => ['magazines', 'newspapers'],
    ];

    foreach ($termsArray as $term) {
        $tax = get_term($term);
        $taxQuery[] = [
            'taxonomy' => $tax->taxonomy,
            'field'    => 'id',
            'terms'    => $term,
        ];
    }

    if (!empty($termsString)) {
        $args['tax_query'] = $taxQuery;
    }

    queryAjax($args);
}

function queryAjax($args)
{
    $query = new WP_Query($args);
    $postsPerPage = get_option('posts_per_page');
    $foundPosts = $query->found_posts;

    if (($foundPosts / $postsPerPage) > 1) {
        $pages = ceil($foundPosts / $postsPerPage);
    }

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part_var('templates/components/archive-posts', ['post' => $query->post]);
        }
    } else {
        echo 'no matches';
    }
    wp_reset_postdata();

    $html = ob_get_contents();
    ob_end_clean();

    wp_send_json(['result' => $html, 'pages' => $pages]);
}

add_action('wp_ajax_archive_pagination', 'archive_pagination');
add_action('wp_ajax_nopriv_archive_pagination', 'archive_pagination');

add_action('wp_ajax_archive_filter', 'archive_filter');
add_action('wp_ajax_nopriv_archive_filter', 'archive_filter');

