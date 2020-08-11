<?php

get_header(); ?>

<div class="pha">
  <div class="container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque distinctio a vero dolores
    facere voluptate, fugiat assumenda eius culpa iusto cupiditate architecto doloremque ut animi accusamus maiores
    corporis nam quo eum quis? Dicta sint ab quae aut modi omnis sapiente officiis blanditiis maxime illo facere dolores
    explicabo temporibus, non aliquam quas tempora quam, laudantium quasi perferendis accusantium. Tenetur voluptatum
    sapiente sint, perspiciatis vero ducimus! Animi nulla quidem corrupti cupiditate vero quasi reprehenderit eligendi,
    natus nemo sed porro ab perspiciatis sequi rerum saepe voluptas, id magnam aliquid eaque. Amet reiciendis quaerat
    vel odit, ratione laborum, ipsam cupiditate provident quod, sit dolore.</div>
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
      <div class="img">
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
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