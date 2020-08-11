<?php 

acf_form_head();

get_header();

the_post()

?>
<div class="page-banner">
  <div class="page-banner__bg-image"
    style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);">
  </div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title() ?></h1>
    <div class="page-banner__intro">
      <p>TODO</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">

  <?php
	
	acf_form(array(
		'post_id'		=> 'new_post',
		'post_title'	=> true,
		'post_content'	=> false,
		'new_post'		=> array(
			'post_type'		=> 'test',
			'post_status'	=> 'publish'
    ),
    'html_submit_button'  => '<input type="submit" class="acf-button button button-primary button-large" value="save" />',
    'updated_message' => __("New test was created.", 'acf'),
	));
	
	?>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

<script>
const title = $('#acf-_post_title')


// console.log(checks)

// checks.each(function(i) {
//   console.log(i)
// })

// $(title).on('keyup', (e) => {
//   const inputs = $('input[type="text"]')
//   const checks = $('input[type="checkbox"]')
//   const hodnota = e.target.value
//   inputs.val(hodnota)

//   checks.each(function(i, c) {
//     $(c).trigger('click')
//   })
//   //$('input[type="submit"]').trigger('click')


// })
</script>

<?php get_footer(); ?>