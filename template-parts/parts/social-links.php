<?php

$instagram_url = carbon_get_theme_option('instagram');
$tiktok_url = carbon_get_theme_option('tik-tok');

$icon_color = get_array_value($args, 'icon-color');

?>

<?php if($icon_color === 'white'): ?>

  <?php if($instagram_url): ?>
    <a href="<?php echo $instagram_url ?>" target="_blank">
      <?php echo get_inline_svg("instagram-icon--white.svg") ?>
      <span class="visually-hidden"><?php esc_html_e('cube-wp instagram', 'cube-wp') ?></span>
    </a>
  <?php endif; ?>

  <?php if($tiktok_url): ?>
    <a href="<?php echo $tiktok_url ?>" target="_blank">
      <?php echo get_inline_svg("tiktok-icon--white.svg") ?>
      <span class="visually-hidden"><?php esc_html_e('cube-wp tiktok', 'cube-wp') ?></span>
    </a>
  <?php endif; ?>

<?php else: ?>

  <?php if($instagram_url): ?>
    <a href="<?php echo $instagram_url ?>" target="_blank">
      <?php echo get_inline_svg("instagram-icon.svg") ?>
      <span class="visually-hidden"><?php esc_html_e('cube-wp instagram', 'cube-wp') ?></span>
    </a>
  <?php endif; ?>

  <?php if($tiktok_url): ?>
    <a href="<?php echo $tiktok_url ?>" target="_blank">
      <?php echo get_inline_svg("tiktok-icon.svg") ?>
      <span class="visually-hidden"><?php esc_html_e('cube-wp tiktok', 'cube-wp') ?></span>
    </a>
  <?php endif; ?>

<?php endif; ?>
