<!DOCTYPE html>
<html <?php language_attributes(); ?> data-mode="light">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width initial-scale=1">

  <!-- Head HTML for each page -->
  <?php echo carbon_get_post_meta(get_the_ID(), 'head-html'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php function_exists('wp_body_open') ? wp_body_open() : do_action( 'wp_body_open' ); ?>

<div class="page-wrapper">

<?php get_template_part('template-parts/header/header'); ?>
