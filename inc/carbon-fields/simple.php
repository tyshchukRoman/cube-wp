<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Звичайна Сторінка'))

  ->add_fields([
    Field::make('rich_text', 'content', 'Контент' )
  ])

  ->where( 'post_type', '=', 'page' )
  ->where( 'post_template', '=', 'template-pages/simple.php' );
