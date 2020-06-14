<?php

get_header();

?>

<div class="container">

  <?php while (have_posts()) {
    the_post(); ?>

  <h1><?php the_title() ?></h1>
  <div class="content"><?php the_content() ?></div>

  <?php }
  echo paginate_links()
  ?>

</div>
<?php

get_footer()

?>