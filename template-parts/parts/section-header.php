<?php

$label = get_array_value($args, 'label');
$title = get_array_value($args, 'title');
$centered = get_array_value($args, 'centered', false);

$centered_class = $centered ? "section-header--centered" : "";

?>

<?php if($title): ?>
  <div class="section-header | flow <?php echo $centered_class ?>">
    <?php if($label): ?>
      <p class="section-label | animate-title">// <?php echo $label ?> //</p>
    <?php endif; ?>

    <h2 class="animate-title"><?php echo $title ?></h2>
  </div>
<?php endif; ?>
