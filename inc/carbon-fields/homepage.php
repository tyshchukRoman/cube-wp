<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Головна сторінка'))

  ->add_tab('Хіро', [
    Field::make('text', 'main-hero__title', 'Заголовок'),
    Field::make('text', 'main-hero__description', 'Опис'),
    Field::make('text', 'main-hero__button-1-url', 'Кнопка 1 (Посилання)')->set_width('50%'),
    Field::make('text', 'main-hero__button-1-text', 'Кнопка 1 (Текст)')->set_width('50%'),
    Field::make('text', 'main-hero__button-2-url', 'Кнопка 2 (Посилання)')->set_width('50%'),
    Field::make('text', 'main-hero__button-2-text', 'Кнопка 2 (Текст)')->set_width('50%'),
  ])

  ->where( 'post_type', '=', 'page' )
  ->where('post_id', '=', get_option( 'page_on_front' ));
