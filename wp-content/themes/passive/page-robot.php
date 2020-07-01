<?php

//response generation function
get_header();

global $response;
global $showText;


$showText = '';

//user posted variables
$pass = $_POST['message_password'];
$email = $_POST['message_email'];

$endpoint = 'https://api.kelta.com/Login';

$options = [
  'method' => 'POST',
  'timeout'     => 45,
  'sslverify'   => false,
  'headers'     => [
    'Content-Type' => "application/x-www-form-urlencoded",
  ],
  'body'  => 'metoda=Login&email=' . $email . '&password=' . $pass,
];

$post = wp_remote_post($endpoint, $options);

//var_dump($post);


if (isset($_POST['btnSubmit'])) {

  $response = json_decode($post['body'], true)['result'];

  //var_dump($response);

  if ($response) {
    global $wpdb;

    $token = json_decode($post['body'], true)['token'];
    $name = json_decode($post['body'], true)['user']['first_name'];

    $_POST['message_password'] = '';
    $_POST['message_email'] = '';

    $token = $token ?: 0;

    $adminEmail = get_option('admin_email');
    $subject = "Aktivacia robota";
    $headers = 'From: ' . $adminEmail . "\r\n" .
      'Reply-To: ' . $adminEmail . "\r\n";

    $message = 'Ahoj ' . $name .  ",\r\n" . "\r\n" .
      'Robot bude aktivovaný na tvojem Kelta účte '  . $email . ' do 24 hodín. ' . "\r\n" . "\r\n" .
      'Pekný zvyšok dňa,' . "\r\n" . "\r\n" .
      'Hilo Investment';

    $data = array(
      'email' => $email,
      'token' => $token
    );

    $messageT = 'Tomaško, ' .  "\r\n" . "\r\n" .
      'prosím zapni robota pro '  . $name . ' s tokenem ' . $token . ' a emailem ' . $email . "\r\n" . "\r\n" .
      'Ď' . "\r\n" . "\r\n";

    $table_name = 'users_tokens';

    $insertDB = $wpdb->insert($table_name, $data, $format = NUll);
    $sent = wp_mail($email, $subject, strip_tags($message), $headers);

    $sentT = wp_mail('tomas.slizik@gmail.com', $subject . 'pro ' . $name, strip_tags($messageT), $headers);

    $sentH
      = wp_mail($adminEmail, $subject . ' pro ' . $name, strip_tags($messageT), $headers);

    $showText = "Robot bude aktivovaný do 24 hodín.";
  } else {
    $showText = "Email, alebo Google autentifkačný kód sa nezohduje s existujúcim Kelta účtom.";
  }
}

?>

<?php
?>

<div class="popup-form <?php echo $response === false ? 'active' :  ''  ?>">
  <div class="container">

    <h4 class="instructions t-center">
      Na aktiváciu robota, ktorý automaticky nastavuje ťažbu, je potrebné zadať nasledujúce informácie.
    </h4>
    <?php

    // var_dump(json_decode(wp_remote_post($endpoint, $options)['body'], true)['token']);
    ?>
    <form action="/robot" method="post">

      <!-- <div class="close">
        <img src="<?php echo get_template_directory_uri(); ?>/images/close-48.png" alt="close button">
      </div> -->
      <?php if ($response) { ?>
      <div class="succeess-message">
        <div class="close">
          <!-- <i class="fas fa-times"></i> -->
          <img src="<?php echo get_template_directory_uri(); ?>/images/close-48.png" alt="close button">
        </div>
        <h2>Aktivácia Robota</h2>
        <?php echo $showText; ?> <br>
        Ďakujeme <br> <br>
        Hilo Investment
      </div>
      <?php } ?>


      <label for="message_email">Email <br><input type="text" name="message_email"
          value="<?php echo esc_attr($_POST['message_email']); ?>"></label>
      <div class="email-error"></div>
      <label for="message_password">Google Autentifikator <br><input type="text" name="message_password"
          value="<?php echo esc_attr($_POST['message_password']); ?>"></label>
      <div class="password-error"></div>
      <input class="btn btn-yellow submit-btn" type="submit" name='btnSubmit' value='Odoslať'>
      <?php if (!$response) { ?>
      <div class="errors"><?php echo $showText; ?></div>
      <?php
      } ?>
    </form>
  </div>
</div>

<?php

get_footer()

?>