<?php

$popups = get_posts([
  'post_type' => 'popup',
  'fields' => 'ids',
]);

foreach($popups as $popup_id): 

  $id = carbon_get_post_meta($popup_id, 'id');
  $autoopen = carbon_get_post_meta($popup_id, 'autoopen');
  $title = carbon_get_post_meta($popup_id, 'title');
  $forms = carbon_get_post_meta($popup_id, 'form');

?>

  <dialog class="popup" id="<?php echo $id ?>" data-autoopen="<?php echo $autoopen ?>">
    <button class="popup__close" type="button">
      <?php echo get_inline_svg('close-icon.svg') ?>
      <span class="visually-hidden"><?php esc_html_e('Close Popup', 'cube-wp') ?></span>
    </button>

    <div class="popup__header | flow">
      <?php echo wpautop($title) ?>
    </div>

    <?php if(!empty($forms)): ?>
      <?php echo do_shortcode("[contact-form-7 id='{$forms[0]['id']}']") ?>
    <?php endif; ?>
  </dialog>

<?php endforeach; ?>
