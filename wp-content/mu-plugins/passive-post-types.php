<?php
function custom_theme_post_types()
{

  register_post_type('FAQ', array(
    'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'post-formats', 'comments'),
    'rewrite' => array(
      'slug' => 'faq'
    ),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'FAQs',
      'add_new_item' => 'Add New FAQ',
      'edit_item' => 'Edit FAQ',
      'all_items' => 'All FAQs',
      'singular_name' => 'FAQ'
    ),
    'menu_icon' => 'dashicons-calendar-alt'
  ));

  register_post_type('testimonials', array(
    'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'post-formats', 'comments'),
    'rewrite' => array(
      'slug' => 'testimonials'
    ),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Testimonials',
      'add_new_item' => 'Add New Testimonials',
      'edit_item' => 'Edit Testimonials',
      'all_items' => 'All Testimonials',
      'singular_name' => 'Testimonials'
    ),
    'menu_icon' => 'dashicons-editor-quote'
  ));

  // register_post_type('test',array(
  //   'supports' => array('title','editor','excerpt'),
  //   'rewrite' => array(
  //     'slug' => 'tests'
  //   ),
  //   'has_archive' => true,
  //   'public' => true,
  //   'show_in_rest' => true,
  //   'labels' => array(
  //     'name' => 'Test',
  //     'add_new_item' => 'Add New Test',
  //     'edit_item' => 'Edit Test',
  //     'all_items' => 'All Tests',
  //     'singular_name' => 'Test'
  //   ),
  //   'menu_icon' => 'dashicons-calendar-alt'
  // ));

  // register_post_type('steps', array(
  //   'supports' => array('title', 'editor', 'excerpt', 'comments'),
  //   'rewrite' => array(
  //     'slug' => 'steps'
  //   ),
  //   'has_archive' => true,
  //   'public' => true,
  //   'show_in_rest' => true,
  //   'labels' => array(
  //     'name' => 'Steps',
  //     'add_new_item' => 'Add New Step',
  //     'edit_item' => 'Edit Step',
  //     'all_items' => 'All Steps',
  //     'singular_name' => 'Step'
  //   ),
  //   'menu_icon' => 'dashicons-calendar-alt'
  // ));
}

add_action('init', 'custom_theme_post_types');