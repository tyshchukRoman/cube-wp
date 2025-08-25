<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Попап'))

  ->add_fields([
    Field::make('text', 'id', 'Посилання')->set_width('50%'),
    Field::make('text', 'autoopen', 'Час для самовідкриття')
      ->set_width('50%')
      ->set_attribute('type', 'number')
      ->set_attribute('placeholder', 'Час в секундах'),
    Field::make('rich_text', 'title', 'Заголовок'),
    Field::make('association', 'form', 'Форма')
      ->set_types([
        [
          'type' => 'post',
          'post_type' => 'wpcf7_contact_form',
        ]
      ])
      ->set_max(1)
  ])

  ->where( 'post_type', '=', 'popup' );
