<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset='<?php bloginfo('charset'); ?>'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="header">
    <div class="container">
      <div class="nav">
        <div class="logo">Kask</div>
        <nav>
          <?php wp_nav_menu(array(
            'theme_location' => 'mainMenu'
          ))
          ?>
        </nav>
      </div>
    </div>
  </header>