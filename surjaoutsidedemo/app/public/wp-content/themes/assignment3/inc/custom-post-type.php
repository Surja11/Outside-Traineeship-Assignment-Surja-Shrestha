<?php
function create_team_post_type()
{
    $labels = array(
        'name'          => 'Teams',
        'singular_name' => 'Team',
        'menu_name'     => 'Teams',
        'add_new'       =>  'Add New Member',
        'edit_item'     => 'Edit Member',
        'view_item'     => 'View Member',
        'all_items'     => 'See All Members',
    );
    $args = array(
        'labels'   => $labels,
        'public'   => true,
        'rewrite'  => array(
            'slug' => 'team',
        ),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'Excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('team', $args);
}
add_action('init', 'create_team_post_type');
