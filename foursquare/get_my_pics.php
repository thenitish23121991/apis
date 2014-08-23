<?php
session_start();

echo $_SESSION['access_token'];

$action_ch = curl_init();
curl_setopt($action_ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($action_ch, CURLOPT_RETURNTRANSFER, true);
$action_url = 'https://api.foursquare.com/v2/users/self/photos?oauth_token='.$_SESSION['access_token'].'&v=20130815';
curl_setopt($action_ch, CURLOPT_URL,$action_url);
$action_result=curl_exec($action_ch);
curl_close($action_ch);
$action_result_json = json_decode($action_result);
$action_photos = $action_result_json->response->photos->items;

var_dump($action_photos);


?>