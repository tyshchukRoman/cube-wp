<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Додаткові Налаштування'))

  ->add_tab('Оптимізація', [
    Field::make('textarea', 'head-html', 'Head HTML'),
  ])

  ->where( 'post_type', '=', 'page' );
