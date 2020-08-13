<?php

get_header();
?>

<?php
while (have_posts()) {
  the_post()
?>

<div class="common-page">
  <div class="container">
    <h1><?php the_title() ?></h1>
    <div class="generic-content">
      <?php the_content() ?>
    </div>
  </div>
</div>

<?php
}
?>

<?php

get_footer()

?>