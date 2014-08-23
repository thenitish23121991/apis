<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
$content = $connection->get('account/verify_credentials',array('screen_name' => $screen_name,'exclude_replies' => 'true','include_rts' => 'false','count' => 30));

echo 'Screen Name: '.$content->screen_name.'<br/>';
echo 'Name: '.$content->name.'<br/>';
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>


<body>

<div class="container">

</div>

</body>
</html>