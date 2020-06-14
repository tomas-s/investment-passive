<?php

get_header();

// $response = '';

// set_query_var('response', 'my_var_value');

// $response = get_query_var('response');

?>

<div class="courses">
  <?php get_template_part('sections/popup-form'); ?>
  <?php if ($response) { ?>
  <div class="success-msg">
    <?php echo $showText; ?>
  </div>
  <?php }; ?>

  <!-- <div class="container"> -->

  <?php while (have_posts()) {
    the_post(); ?>


  <?php
    $menu_name = 'courseMenu';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menuitems = wp_get_nav_menu_items($menu->term_id);
    $menulength = sizeof($menuitems);
    ?>

  <div class="course">

    <ul class="course-nav">
      <div class="courses-levels">
        <button class="active mine"><span>Ťažba</span></button>
        <button class="opti"><span>Optimalizacia</span></button>
      </div>
      <?php

        $count = 0;
        $submenu = false;

        foreach ($menuitems as $item) :

          $title = $item->title;
          if (!$item->menu_item_parent) :

            // save this id for later comparison with sub-menu items
            $parent_id = $item->ID;
            $counter = 1;
        ?>
      <li class="course-nav-item">

        <span class="section"><?php echo $title; ?></span>

        <?php endif; ?>
        <?php if ($parent_id == $item->menu_item_parent) : ?>

        <?php if (!$submenu) : $submenu = true; ?>
        <ul class="sub-menu">
          <?php endif; ?>

          <li class="course-nav-sub-item" data-index="<?php echo $count; ?>">
            <span>
              <?php
                    $preNbr = $counter < 11 ? '0' . strval($counter) : $counter;
                    echo $preNbr;
                    $counter++
                    ?>
            </span>
            <span><?php echo $title; ?></span>
            <div class="content">
              <h3><?php echo $title; ?></h3>
              <?php $post = get_post(get_post_meta($item->ID, '_menu_item_object_id', true));
                    echo $post->post_content; ?>
              <?php if ($menulength - 1 == $count) : ?>
              <button class="btn btn-yellow btn-popup">Optimalizovat</button>
              <div class="buttons">
                <button class='prev-lesson'> &#8592; zpet</button>
              </div>
              <?php else : ?>
              <div class="buttons <?php echo $count == 1 ? 'f-end' : '' ?> ">
                <?php if ($count > 1) : ?>
                <button class='prev-lesson'> &#8592; zpet </button>
                <?php endif; ?>
                <button class='next-lesson'>pokračovať &#8594;</button>
              </div>
              <?php endif; ?>
            </div>
          </li>

          <?php if ($menuitems[$count + 1]->menu_item_parent != $parent_id && $submenu) : ?>
        </ul>
        <?php $submenu = false;
                endif; ?>

        <?php endif; ?>

        <?php if ($menuitems[$count + 1]->menu_item_parent != $parent_id) : ?>
      </li>
      <?php $submenu = false;
            endif; ?>


      <?php $count++;
        endforeach; ?>
    </ul>
    <div class="right-panel">
      <div class="shown-content"></div>
    </div>
  </div>

  <?php }
  echo paginate_links()
  ?>
  <!-- </div> -->
</div>



<?php

get_footer()

?>