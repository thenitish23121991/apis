<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
$action = "";
$url = "";


echo $_SESSION['access_token'];

if(isset($_GET['action']) && !empty($_GET['action'])){

$action = $_GET['action'];

if($action == 'get_my_photos'){
$url = 'https://api.instagram.com/v1/users/self/media/recent?access_token='.$_SESSION['access_token'];
}else if($action == 'get_my_followed_people'){
$url = 'https://api.instagram.com/v1/users/self/follows?access_token='.$_SESSION['access_token'];
}
else if($action == 'get_popular_photos'){
$url = 'https://api.instagram.com/v1/media/popular?access_token='.$_SESSION['access_token'];
}




		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$pictures = curl_exec($curl);
		curl_close($curl);

		$pics = json_decode($pictures,true);

		// display the url of the last image in standard resolution
		//print_r($pics);
		
		if($action == 'get_popular_photos' || $action == 'get_my_photos'){
		//$image_id = "";
		foreach($pics['data'] as $p){
		$image_id = $p['id'];
		echo '<a href="image.php?id='.$image_id.'"><img src="'.$p['images']['standard_resolution']['url'].'" /></a>';
		}
		
		}
		
		if($action == 'get_my_followed_people'){
		foreach($pics['data'] as $p){
		echo '<div><img src="'.$p['profile_picture'].'" />'.$p['first_name'].'('.$p['username'].')</div>';
		}
		}
		
}


?>
