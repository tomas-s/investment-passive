<section class="faq p-top-bottom">
  <div class="container">
    <h4 class="section-headline">FAQ</h4>
    <!-- <h3 class="section-subheadline"></h3> -->
    <?php
    $homepagePosts = new WP_Query(array(
      'post_type' => 'FAQ',
      'order'   => 'ASC'
    ));
    while ($homepagePosts->have_posts()) {
      $homepagePosts->the_post();
    ?>

    <div class="collapse">
      <div class="faq-title">
        <h3><?php the_title(); ?></h3>
        <i class="fas fa-chevron-down"></i>
      </div>
      <div class="collapse-content">
        <?php the_content(); ?>
      </div>
    </div>



    <?php }
    wp_reset_postdata();
    ?>
  </div>
</section>