<?php
require_once('twitter_config.php');

if(isset($_GET['oauth_token'])){

$connection = new TwitterOAuth($consumer_key,$consumer_secret,$_SESSION['request_token'],$_SESSION['request_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

if($access_token){
$connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token['oauth_token'],$access_token['oauth_token_secret']);
$params = array();

$params['include_entities'] = 'false';
$content = $connection->get('account/verify_credentials',$params);

echo $content;
}else{
echo 'Login error';
}


}

?>