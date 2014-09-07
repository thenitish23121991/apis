<?php
session_start();
require_once('../Init.php');
error_reporting(E_ALL);
ini_set('display_errors','1');
$code = "";
$access_token = "";

$action_ch = curl_init();
curl_setopt($action_ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($action_ch, CURLOPT_RETURNTRANSFER, true);
$action_url = 'https://api.foursquare.com/v2/users/self?oauth_token='.$_SESSION['foursquare_access_token'].'&v=20130815';
curl_setopt($action_ch, CURLOPT_URL,$action_url);
$action_result=curl_exec($action_ch);
curl_close($action_ch);
$action_result_json = json_decode($action_result);
//var_dump($action_result_json);

$first_name = $action_result_json->response->user->firstName;
$last_name = $action_result_json->user->lastName;
$fo_id = $action_result_json->user->id;

echo $first_name;

$user->add_user($first_name,$last_name,'foursquare','','','',$fo_id);


?>