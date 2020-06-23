<?php

get_header(); ?>

<div class="pha">
  <div class="container">
    <div class="pha-left">
      <h2>Optimalizuj svoj <span>pasívny</span> príjem</h2>
      <h4>Jedna vec, ktorá Vám umožní mať konštantne vyššie týždenné payouty bez manuálneho nastavovania ťažby
        kryptomien.</h4>
      <div>
        <a href="/robot" class="btn btn-black">Začať</a>
      </div>
    </div>
    <div class="pha-right">
      <!-- <div class="video">
        <video id="video1" autoplay="">
          <source src="https://interactive-examples.mdn.mozilla.net/media/examples/flower.mp4" type="video/mp4">
        </video>
      </div> -->
      <img src="<?php echo get_template_directory_uri(); ?>/images/robot.png" class="robot" alt="robot icon">
    </div>
  </div>
</div>

<?php get_template_part('sections/benefits'); ?>
<?php get_template_part('sections/sentence'); ?>
<?php get_template_part('sections/faq'); ?>


<!-- <div class="ova">
  <div class="container">
    <h3>It’s time to start
      investing in yourself</h3>
    <a href="/robot" class="btn btn-black">Začať</a>
  </div>
</div> -->


<?php
get_footer()

?>