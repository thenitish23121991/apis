<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
$content = $connection->get('account/verify_credentials');



?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>


<body>

<div class="container">
<a href="twitter_feed.php">Get my feed</a>
</div>

</body>
</html>