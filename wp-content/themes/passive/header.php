<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset='<?php bloginfo('charset'); ?>'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/robot.png">
  <script src="https://kit.fontawesome.com/f130b21045.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
    rel="stylesheet">
  <title>Hilo Investment</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="header">
    <div class="container">
      <div class="nav">
        <div class="logo">
          <a href="/">Hilo Investment</a>
        </div>
        <nav>
          <?php wp_nav_menu(array(
            'theme_location' => 'mainMenu'
          ))
          ?>
          <?php
          $post = $wp_query->get_queried_object();
          $pagename = $post->post_name;
          if ($pagename != 'robot') {
          ?>
          <a href="/robot" class="btn btn-black">Začať</a>
          <?php   }
          ?>
        </nav>
      </div>
    </div>
  </header>