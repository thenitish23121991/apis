<?php
require_once('twitteroauth.php');
require_once('twitter_config.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$connection = new TwitterOAuth($consumer_key,$consumer_secret);
$request_token = $connection->getRequestToken($oauth_callback);


if($request_token){
$token = $request_token['oauth_token'];
$_SESSION['request_token'] = $token;
$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];

switch($connection->http_code){
case 200:
$url = $connection->getAuthorizeURL($token);
header('Location: '.$url);
break;
default:
echo 'Connection with twitter failed';
break;
}
}else{
echo 'Error requesting token';
}


?>