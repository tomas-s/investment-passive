<?php
get_header();
?>

<div class="gallery-post">
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

  <div class="fullsize">
  </div>
</div>

<?php
get_footer();
?>