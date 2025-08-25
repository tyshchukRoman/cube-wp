<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action( 'carbon_fields_register_fields', 'cube_wp_attach_theme_options' );

function cube_wp_attach_theme_options() {
  require get_template_directory() . '/inc/carbon-fields/theme-options.php';
  require get_template_directory() . '/inc/carbon-fields/homepage.php';
  require get_template_directory() . '/inc/carbon-fields/simple.php';
  require get_template_directory() . '/inc/carbon-fields/popup.php';
  require get_template_directory() . '/inc/carbon-fields/page.php';
}


add_action('after_setup_theme', 'cube_wp_load');

function cube_wp_load() {
  require_once get_template_directory() . '/vendor/autoload.php';
  \Carbon_Fields\Carbon_Fields::boot();
}
