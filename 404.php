<?php 

get_header();

$content = carbon_get_theme_option('404__content');

?>

<main class="not-found" id="main">

<section class="not-found | section">
  <div class="content__wrapper | wrapper">
    <div class="not-found__prose | prose">
      <?php echo wpautop($content) ?>
    </div>

    <div class="not-found__button | cluster">
      <a href="<?php echo home_url() ?>" class="button">
        <?php esc_html_e('На Головну', 'cube-wp') ?>
      </a>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
