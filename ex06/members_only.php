<?php
$valid_passwords = array ("zaz" => "jaimelespetitsponeys");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  header('Content-Type: text/html');
  die("<html><body>Cette zone est accessible uniquement aux membres du site</body></html>");

}
$image = file_get_contents("../img/42.png");
$encode = base64_encode($image);
// If arrives here, is a valid user.
echo "<html><body>\n";
echo "Bonjour $user.<br />";
echo "<img src='data:image/png;base64, ";
echo $encode;
echo "'>\n";
echo "</body></html>";

?>
