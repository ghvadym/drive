<?php
/*
function createPostTypes()
{
    createPostType('magazines', [
        'menu_icon' => 'dashicons-text-page',
        'labels'    => [
            'name'          => __('Magazines', 'newspaper'),
            'singular_name' => __('Magazines', 'newspaper'),
            'add_new_item'  => __('Add New Magazine', 'newspaper'),
            'view_item'     => __('View Magazine', 'newspaper'),
            'search_items'  => __('Search Magazine', 'newspaper'),
            'not_found'     => __('No News found', 'newspaper'),
            'menu_name'     => __('Magazines', 'newspaper'),
        ],
    ]);

    createTaxonomy('categories', 'magazines', [
        'labels' => [
            'singular_name'     => __('Categories', 'newspaper'),
            'search_items'      => __('Search Category', 'newspaper'),
            'all_items'         => __('All Categories', 'newspaper'),
            'parent_item'       => __('Parent Category', 'newspaper'),
            'parent_item_colon' => __('Parent Category:', 'newspaper'),
            'edit_item'         => __('Edit Category', 'newspaper'),
            'update_item'       => __('Update Category', 'newspaper'),
            'add_new_item'      => __('Add New Category', 'newspaper'),
            'new_item_name'     => __('New Category Name', 'newspaper'),
            'menu_name'         => __('Categories', 'newspaper'),
        ],
    ]);
}
*/

function createPostType($postType, $args = [])
{
    $args = array_merge([
        'public'        => true,
        'show_ui'       => true,
        'has_archive'   => true,
        'menu_position' => 20,
        'hierarchical'  => true,
        'supports'      => ['title', 'excerpt', 'thumbnail', 'editor'],
    ], $args);

    register_post_type($postType, $args);
}

function createTaxonomy($taxonomy, $postType, $args = [])
{
    $args = array_merge([
        'description'  => '',
        'public'       => true,
        'hierarchical' => true,
        'has_archive'  => true,
    ], $args);

    register_taxonomy($taxonomy, $postType, $args);
}

add_action('init', 'createPostTypes');