<?php
/*
 * Template Name: Simple
 */

$content = carbon_get_post_meta(get_the_ID(), 'content');

get_header(); ?>

<main class="page simple-page" id="main">

<section class="content | section">
  <div class="content__wrapper | wrapper">
    <h1 class="content__title | h2"><?php the_title() ?></h1>

    <div class="prose">
      <?php echo wpautop($content) ?>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
