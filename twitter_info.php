<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');
require_once('Init.php');

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
$content = $connection->get('account/verify_credentials',array('exclude_replies' => 'true','include_rts' => 'false','count' => 30));

echo 'Screen Name: '.$content->screen_name.'<br/>';
echo 'Name: '.$content->name.'<br/>';
echo 'ID: '.$content->id.'<br/>';

$name_arr = explode(" ",$content->name);
$first_name = $name_arr[0];
$last_name = $name_arr[1];
$t_id = $content->id;

$user->add_user($first_name,$last_name,'','',$t_id,'');


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