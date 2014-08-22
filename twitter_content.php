<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');

print_r($_SESSION);

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['request_token'],$_SESSION['request_token_secret']);
$content = $connection->get('account/verify_credentials');

print_r($content);

?>