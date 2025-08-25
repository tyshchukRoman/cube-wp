<?php

function cube_wp_enqueue() {
  $DIST_PATH = get_template_directory() . '/dist';
  $DIST_URI  = get_template_directory_uri() . '/dist';

  /*
   * CSS
   */
  $styles = [
    'not-found' => is_404(),
    'homepage'  => is_front_page(),
    'simple'    => is_page_template('template-pages/simple.php'),
  ];

  foreach ($styles as $key => $condition) {
    if ($condition) {
      $file_path = "{$DIST_PATH}/css/{$key}.css";
      $file_uri  = "{$DIST_URI}/css/{$key}.css";

      wp_enqueue_style("{$key}-style", $file_uri, [], file_exists($file_path) ? filemtime($file_path) : false, 'all');
    }
  }

  /*
   * JavaScript (ES module, bundled with esbuild)
   */
  $main_js_path = "{$DIST_PATH}/js/main.js";
  $main_js_uri  = "{$DIST_URI}/js/main.js";

  wp_enqueue_script_module('main', $main_js_uri, [], file_exists($main_js_path) ? filemtime($main_js_path) : false, true);

  /*
   * Passing PHP variables to JavaScript
   */
  wp_localize_script('main', 'site', [
    'ajax_url'    => admin_url('admin-ajax.php'),
    'ajax_nonce'  => wp_create_nonce('secure_nonce_name'),
    'site_url'    => get_site_url(),
    'theme_url'   => get_template_directory_uri(),
  ]);
}

add_action('wp_enqueue_scripts', 'cube_wp_enqueue');

