<?php

// theme options
$footer_description = carbon_get_theme_option('footer-text');
$instagram_url = carbon_get_theme_option('instagram');
$tiktok_url = carbon_get_theme_option('tik-tok');
$phone_url = carbon_get_theme_option('phone-url');
$phone = carbon_get_theme_option('phone');


// get all menu locations
$locations = get_nav_menu_locations();

// filter to get only footer menus
$locations = array_filter($locations, fn($location) => str_contains($location, 'footer-menu'), ARRAY_FILTER_USE_KEY);
$locations = array_filter($locations, fn($location) => $location !== 0);

// create array menus to render in html
$menus = array_map(function($menu_id, $location) {
	$menu = wp_get_nav_menu_object($menu_id);

	return [
		'title' => $menu->name ?? 'Menu Title',
		'menu' => wp_nav_menu([
			'theme_location' => $location,
			'echo' => false,
		])
	];
}, $locations, array_keys($locations), array_values($locations));

?>

<footer class="footer" id="footer">
	<div class="wrapper">
    <div class="footer__inner | flow">
      <a href="<?php echo home_url() ?>" class="footer__logo">
        <?php echo get_inline_svg('light-logo.svg') ?>
        <span class="visually-hidden"><?php esc_html_e('Go to homepage', 'cube-wp') ?></span>
      </a>

      <div class="footer__main | repel">
        <?php if($footer_description): ?>
          <div class="footer__info | flow">
            <?php echo wpautop($footer_description) ?>
          </div>
        <?php endif; ?>

        <div class="footer__menu-wrapper | cluster">
          <?php foreach ($menus as $menu): ?>
            <div class="footer__col">
              <?php echo $menu['menu'] ?>
            </div>
          <?php endforeach; ?>

          <div class="footer__col footer__contacts | flow">
            <?php if($phone_url && $phone): ?>
              <a href="<?php echo $phone_url ?>" target="_blank" class="labelled-icon">
                <?php echo $phone ?>
              </a>
            <?php endif; ?>

            <div class="footer__socials | cluster">
              <?php get_template_part('template-parts/parts/social-links', null, ['icon-color' => 'white']) ?>
            </div>
          </div>
        </div>
      </div>

      <p class="footer__copyright"><?php echo date('Y') ?> © cube-wp</p>
    </div>
	</div>
</footer>
