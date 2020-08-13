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
        <nav>
          <?php wp_nav_menu(array(
            'theme_location' => 'mainMenu'
          ))
          ?>
        </nav>
        <div class="logo">Kasky</div>
        <div class="socials">
          <a href="https://www.facebook.com/milan.kasala"><i class="fa fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/kasky_12/"><i class="fa fa-instagram"></i></a>
          <a href=""><i class="fa fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </header>