<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Налаштування Сайту')
  
  ->add_tab('Глобальні Посилання', [
    Field::make('text', 'cta-link', 'CTA (Посилання)'),
  ])

  ->add_tab('Контакти', [
    Field::make('text', 'location', 'Локація')->set_width('50%'),
    Field::make('text', 'location-url', 'Локація (Посилання)')->set_width('50%'),

    Field::make('text', 'phone', 'Телефон')->set_width('50%'),
    Field::make('text', 'phone-url', 'Телефон (Посилання)')->set_width('50%'),

    Field::make('text', 'email', 'Email')->set_width('50%'),
    Field::make('text', 'email-url', 'Email (Посилання)')->set_width('50%'),
  ])

  ->add_tab('Соціальні мережі', [
    Field::make('text', 'instagram', 'Інстаграм (Посилання)'),
    Field::make('text', 'tik-tok', 'Tik-Tok (Посилання)'),
    Field::make('text', 'whatsapp', 'WhatsApp (Посилання)'),
    Field::make('text', 'viber', 'Viber (Посилання)')
  ])

  ->add_tab('Підвал', [
    Field::make('rich_text', 'footer-text', 'Опис в підвалі')
  ])

  ->add_tab('Сторінка 404', [
    Field::make('rich_text', '404__content', 'Контент'),
  ])

  ->add_tab('Скрипти', [
    Field::make('header_scripts', 'header-scripts', 'Скрипти в шапці'),
    Field::make('footer_scripts', 'footer-scripts', 'Скрипти в підвалі')
  ]);
