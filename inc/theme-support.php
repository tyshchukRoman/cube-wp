<?php

function cube_support(){
	load_theme_textdomain( 'cube-wp', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );

  register_nav_menus(
    array(
      'header-menu' => __('Header Menu', 'cube-wp'),
      'mobile-menu' => __('Mobile Menu', 'cube-wp'),
      'footer-menu-1' => __('Footer Col 1', 'cube-wp'),
      'footer-menu-2' => __('Footer Col 2', 'cube-wp'),
      'footer-menu-3' => __('Footer Col 3', 'cube-wp'),
    )
  );
}

add_action( 'after_setup_theme', 'cube_support', 0 );


/*
 * Disable editors in posts and pages
 */
function disable_editors_for_posts_and_pages() {
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
}

add_action('init', 'disable_editors_for_posts_and_pages');


/*
 * Disable block styles
 */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_action( 'wp_enqueue_scripts', function() {
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'classic-theme-styles' );
});

add_filter( 'should_load_separate_core_block_assets', '__return_true' );
