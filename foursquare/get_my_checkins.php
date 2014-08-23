<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
echo $_SESSION['access_token'];

$action_ch = curl_init();
curl_setopt($action_ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($action_ch, CURLOPT_RETURNTRANSFER, true);
$action_url = 'https://api.foursquare.com/v2/users/self/checkins?oauth_token='.$_SESSION['access_token'].'&v=20130815&limit=100';
curl_setopt($action_ch, CURLOPT_URL,$action_url);
$action_result=curl_exec($action_ch);
curl_close($action_ch);
$action_result_json = json_decode($action_result);
$action_checkins = $action_result_json->response->checkins->items;
var_dump($action_result_json);


?>