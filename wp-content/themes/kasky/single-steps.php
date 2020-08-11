<?php wp_nav_menu(array(
    'theme_location' => 'courseMenu'
  )) ?>

<?php 
while (have_posts()) {
  the_post() ?>

<h1><?php the_title() ?></h1>
<div class="embed-container">
    <!-- <?php the_field('vid'); ?> -->

    <?php
$file = get_field('video');
if( $file ): ?>
<video  width="550">

<source src="<?php echo $file['url']; ?>"
        type="video/webm">

<source src="<?php echo $file['url']; ?>"
        type="video/mp4">

Sorry, your browser doesn't support embedded videos.
</video>

<button>play</button>

<script>

const video = document.querySelector('video');

document.querySelector('button').addEventListener('click', (event) => {
  console.log('The Boolean paused property is now false. Either the ' + 
  'play() method was called or the autoplay attribute was toggled.');

  video.play()
});

</script>


<video controls  width="550">

<source src="<?php echo $file['url']; ?>"
        type="video/webm">

<source src="<?php echo $file['url']; ?>"
        type="video/mp4">

Sorry, your browser doesn't support embedded videos.
</video>
<?php endif; ?>
    <?php

// Load value.
$iframe = get_field('vid');

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replcae HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// Display customized HTML.
echo $iframe;
?>
</div>

<?php
}

?>