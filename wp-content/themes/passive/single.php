<?php
get_header();
?>


<div class="container">

  <?php
  while (have_posts()) {
    the_post()
  ?>

  <h1><?php the_title() ?></h1>
  <div class="generic-content">
    <?php the_content() ?>
  </div>

  <?php
  }
  ?>

</div>


<?php
get_footer();
?>