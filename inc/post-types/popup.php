<?php

function cube_popup_post_type() {

  $labels = [
    'name'                  => 'Попап',
    'singular_name'         => 'Попап',
    'menu_name'             => 'Попапи',
    'name_admin_bar'        => 'Попапи',
    'add_new_item'          => 'Додати Попап',
  ];

  $args = [
    'labels'                => $labels,
    'label'                 => 'Попапи',
    'supports'              => ['title'],
    'menu_icon'             => 'dashicons-format-status',
    'menu_position'         => 5,
    'public'                => false,           
    'publicly_queryable'    => false,
    'exclude_from_search'   => true,
    'show_ui'               => true,
    'show_in_nav_menus'     => false,
    'show_in_rest'          => false,
    'rewrite'               => false,
    'has_archive'           => false,
  ];

  register_post_type('popup', $args);

}

add_action('init', 'cube_popup_post_type', 0);
