<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
$action = "";
$url = 'https://api.instagram.com/v1/users/1574083/?access_token='.$_SESSION['access_token'];
require_once('../Init.php');


		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$pictures = curl_exec($curl);
		curl_close($curl);

		$pics = json_decode($pictures,true);


?>