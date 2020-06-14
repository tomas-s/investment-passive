<?php

//response generation function

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


if (isset($_POST['btnSubmit'])) {

  $response = json_decode(wp_remote_post($endpoint, $options)['body'], true)['result'];

  if ($response) {
    global $wpdb;

    $token = json_decode(wp_remote_post($endpoint, $options)['body'], true)['token'];
    $name = json_decode(wp_remote_post($endpoint, $options)['body'], true)['user']['first_name'];

    $_POST['message_password'] = '';
    $_POST['message_email'] = '';

    $token = $token ?: 0;

    $adminEmail = get_option('admin_email');
    $subject = "Optimalizacia bude brzy zapnuta ";
    $headers = 'From: ' . $adminEmail . "\r\n" .
      'Reply-To: ' . $adminEmail . "\r\n";

    $message = 'Ahoj ' . $name .  ",\r\n" . "\r\n" .
      'diky ze nam duverujes. Optimalizator bude pro tebe zapnuty do 2 hodin.' . "\r\n" . "\r\n" .
      'Pekny zbytek dne preje,' . "\r\n" .
      'tym Hilo Investment';

    $data = array(
      'email' => $email,
      'token' => $token
    );

    $table_name = 'users_tokens';

    $insertDB = $wpdb->insert($table_name, $data, $format = NUll);
    $sent = wp_mail($email, $subject, strip_tags($message), $headers);

    $showText = "Optimalizator vam bude zapnut do 2 hodin.";
  } else {
    $showText = "Email nebo autentifikator byl zadan spatne.";
  }
}

?>

<?php
?>

<div class="popup-form <?php echo $response === false ? 'active' :  ''  ?>">
  <div class="container">
    <?php

    // var_dump(json_decode(wp_remote_post($endpoint, $options)['body'], true)['token']);
    ?>
    <form action="/course" method="post">
      <div class="close">
        <img src="<?php echo get_template_directory_uri(); ?>/images/close-48.png" alt="close button">
      </div>
      <?php if (!$response) { ?>
      <div class="errors"><?php echo $showText; ?></div>
      <?php } ?>
      <label for="message_email">Vas email <br><input type="text" name="message_email"
          value="<?php echo esc_attr($_POST['message_email']); ?>"></label>
      <label for="message_password">Google Autentifikator <br><input type="text" name="message_password"
          value="<?php echo esc_attr($_POST['message_password']); ?>"></label>
      <input class="btn btn-yellow submit-btn" type="submit" name='btnSubmit'>
    </form>
  </div>
</div>