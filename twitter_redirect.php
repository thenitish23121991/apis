<?php
session_start();
require_once('twitteroauth.php');
require_once('twitter_config.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

if(isset($_GET['oauth_token'])){

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['request_token'],$_SESSION['request_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

if($access_token){
$_SESSION['access_token'] = $access_token['oauth_token'];
$_SESSION['access_token_secret'] = $access_token['oauth_token_secret'];
$connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token['oauth_token'],$access_token['oauth_token_secret']);
$params = array();

$params['include_entities'] = 'false';

header('Location: twitter_content.php');
}else{
echo 'Login error';
}


}

?>