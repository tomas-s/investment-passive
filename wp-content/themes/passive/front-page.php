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
      <img src="<?php echo get_template_directory_uri(); ?>/images/robot.png" class="robot" alt="robot icon">
    </div>
  </div>
</div>

<?php get_template_part('sections/benefits'); ?>
<?php get_template_part('sections/sentence'); ?>
<?php
$faqs = new WP_Query(array(
  'post_type' => 'FAQ'
));
if ($faqs->have_posts()) {
  get_template_part('sections/faq');
}
?>

<?php
$testimonials = new WP_Query(array(
  'post_type' => 'testimonials'
));
if ($testimonials->have_posts()) {
  get_template_part('sections/testimonials');
}
?>


<div class="ova">
  <div class="container">
    <h3>Nastal čas si zjednodušiť život</h3>
    <a href="/robot" class="btn btn-black">Začať</a>
  </div>
</div>


<?php
get_footer()

?>