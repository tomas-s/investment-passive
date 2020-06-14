<?php

function university_resources()
{
  wp_enqueue_script('main_script', get_theme_file_uri("/js/scripts-bundled.js"), NULL, microtime(), true);
  wp_enqueue_style('custom_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('main_styles', get_stylesheet_uri(), NULL, microtime());
}

add_action('wp_enqueue_scripts', 'university_resources');

function university_features()
{
  register_nav_menu('mainMenu', 'Header Menu');
  register_nav_menu('footerMenu', 'Footer Menu');
  register_nav_menu('courseMenu', 'Course Menu');
  register_nav_menu('optiMenu', 'Course Opti Menu');
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query)
{
  if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
      )
    ));
  }
}

add_action('pre_get_posts', 'university_adjust_queries');

function wpb_sender_name($original_email_from)
{
  return 'Hilo Investment';
}

add_filter('wp_mail_from_name', 'wpb_sender_name');