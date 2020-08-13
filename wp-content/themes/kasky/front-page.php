<?php

get_header(); ?>

<div class="pha">
  <div class="container">
  </div>
</div>

<div class="brno">
  <div class="container">
    <?php
    $homepagePosts = new WP_Query(array(
      'posts_per_page' => 10,
      'post_type' => 'post'
    ));
    while ($homepagePosts->have_posts()) {
      $homepagePosts->the_post();
      $image = get_field('thumbnail_image');
    ?>

    <a class="portfolio-post" href="<?php the_permalink(); ?>">
      <div class="portfolio-headlines">
        <h3><?php the_title(); ?></h3>
        <h4><?php the_field('short_description'); ?></h4>
      </div>
      <div class="img"
        style="background: url(<?php echo esc_url($image['url']) ?>)"
      >
        <!-- <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> -->
      </div>
    </a>

    <?php }
    wp_reset_postdata();
    ?>
  </div>
</div>

<?php
get_footer()

?>