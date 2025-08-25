<?php

$cta_link = carbon_get_theme_option('cta-link');

?>

<div class="mobile-menu">
  <div class="mobile-menu__overlay"></div>

    <div class="mobile-menu__inner | flow">
      <div class="mobile-menu__menu">
        <?php
          wp_nav_menu([
            'theme_location' => 'mobile-menu',
         ]);
        ?>
      </div>

      <div class="header__socials | cluster">
        <?php get_template_part('template-parts/parts/social-links') ?>
      </div>

      <?php if($cta_link): ?>
        <a href="<?php echo $cta_link ?>" class="button">
          <?php esc_html_e('CTA Button', 'cube-wp') ?>
        </a>
      <?php endif; ?>
  </div>
</div>
