<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
$content = $connection->get('statuses/user_timeline',array('screen_name' => $screen_name,'exclude_replies' => 'true','include_rts' => 'false','count' => 30));

foreach($content as $c){
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