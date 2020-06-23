<div class="testimonials p-top-bottom">
  <div class="container">
    <h4 class="section-headline">Testimonials</h4>
    <h3 class="section-subheadline">Čo o nas rikaji nasi klienti</h3>



    <div class="carousel-btns">
      <div class="buttons">
        <button class="prev"> &#8592; </button>
        <span class="testimonials-start">01</span><span>/</span><span class="testimonials-end"></span>
        <button class="next"> &#8594; </button>
      </div>
      <div class="carousel">
        <?php
        $x = 1;
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 10,
          'post_type' => 'testimonials'
        ));
        while ($homepagePosts->have_posts()) {
          $homepagePosts->the_post();
        ?>

        <div class="carousel-item <?php echo $x == 1 ? 'active' : '' ?>"> <?php the_content(); ?>
          <div class="author"><?php the_title(); ?></div>
        </div>

        <?php
          $x++;
        }
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</div>