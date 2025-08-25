<header class="header">
  <div class="wrapper">
    <div class="header__inner">

      <!-- Logo -->
      <div class="header__logo">
        <a href="<?php echo home_url() ?>">
          <?php echo get_inline_svg('primary-logo.svg') ?>
          <span class="visually-hidden"><?php esc_html_e('Go to homepage', 'cube-wp') ?></span>
        </a>
      </div>

      <!-- Menu 1 -->
      <div class="header__menu header__menu | display-none display-xl-block">
        <?php
          wp_nav_menu([
            'theme_location' => 'header-menu',
          ]);
        ?>
      </div>

      <!-- Mobile Menu -->
      <div class="header__mobile-menu | display-xl-none">
        <button class="header__menu-button">
          <?php echo get_inline_svg('menu-icon.svg') ?>
          <span class="visually-hidden"><?php esc_html_e('Mobile Menu', 'cube-wp') ?></span>
        </button>

        <?php get_template_part('template-parts/parts/mobile-menu') ?>
      </div>

      <!-- Desktop Social -->
      <div class="header__socials | cluster display-none display-xl-flex">
        <?php get_template_part('template-parts/parts/social-links') ?>
      </div>
    </div>
  </div>
</header>
