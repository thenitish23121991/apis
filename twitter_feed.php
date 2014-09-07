<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');
require_once('Init.php');

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
$content = $connection->get('statuses/user_timeline',array('exclude_replies' => 'true','include_rts' => 'false','count' => 30));

foreach($content as $c){
print_r($c).'<br/><br/><br/>';
echo '<div><div>'.
$c->user->screen_name
.'</div>
<div>'.
$c->text
.'</div>
</div><br/>';
}

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