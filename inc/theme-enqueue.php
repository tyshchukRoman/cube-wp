<?php

function cube_wp_enqueue () {
  $DIST_PATH = get_template_directory() . '/dist';
  $DIST_URI = get_template_directory_uri() . '/dist';


  /*
   * CSS
   */
  $styles = [
    'not-found' => is_404(),
    'homepage' => is_front_page(),
    'simple' => is_page_template('template-pages/simple.php'),
  ];

  foreach($styles as $key => $condition) {
    if($condition) {
      $file_path = "{$DIST_PATH}/css/{$key}.css";
      $file_uri = "{$DIST_URI}/css/{$key}.css";

      wp_enqueue_style( "{$key}-style", $file_uri, [], filemtime($file_path), 'all' );
    }
  }


  /*
   * JavaScript
   */
  wp_enqueue_script( 'swiper', "{$DIST_URI}/js/swiper.min.js", [], '11.2.8', true );
  wp_enqueue_script( 'gsap', "{$DIST_URI}/js/gsap.min.js", [], '3.13.0', true );
  wp_enqueue_script( 'scroll-trigger', "{$DIST_URI}/js/ScrollTrigger.min.js", ['gsap'], '3.13.0', true );
  wp_enqueue_script( 'main', "{$DIST_URI}/js/main.js", ['scroll-trigger', 'swiper'], filemtime("${DIST_PATH}/js/main.js"), true );


  /*
   * Passing PHP variables to JavaScript
   */ 
  wp_localize_script( 'main', 'site', [ 
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'ajax_nonce' => wp_create_nonce( "secure_nonce_name" ),
    'site_url' => get_site_url(),
    'theme_url' => get_template_directory_uri()
  ]);
}

add_action('wp_enqueue_scripts', 'cube_wp_enqueue');
