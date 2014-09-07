<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
$code = "";
$url = "";
$client_id = 'faf4debe2fe74963833bd88249c3c9b0';
$client_secret = '5e0e72148ad64e61aeb5e8db630a7646';
$redirect_uri = 'http://apis1.herokuapp.com/instagram/redirect.php';



if(!isset($_SESSION['access_token'])){

if(isset($_GET['code'])  && !empty($_GET['code'])){
$code = $_GET['code'];

$_SESSION['code'] = $code;


$url = "https://api.instagram.com/oauth/access_token";
$access_token_parameters = array(
'client_id'                =>     $client_id,
		        'client_secret'            =>     $client_secret,
		        'grant_type'               =>     'authorization_code',
		        'redirect_uri'             =>     $redirect_uri,
		        'code'                     =>     $code
		);
		$curl = curl_init($url);    // we init curl by passing the url
		curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
		curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
		$result = curl_exec($curl);   // to perform the curl session
		curl_close($curl);   // to close the curl session

		$arr = json_decode($result,true);
		print_r($arr);
		//print_r($arr);
		//echo $arr['access_token'];   // display the access_token
		$_SESSION['access_token'] = $arr['access_token'];		
		
		
		$pictureURL = 'https://api.instagram.com/v1/users/self/media/recent?access_token='.$arr['access_token'];

		// to get the user's photos
		$curl = curl_init($pictureURL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$pictures = curl_exec($curl);
		curl_close($curl);

		$pics = json_decode($pictures,true);

		// display the url of the last image in standard resolution
		print_r($pics);
}
}
else{

}


?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<script type="text/javascript">
var access_token = <?php echo json_encode($_SESSION['access_token']); ?>
</script>
</head>
<body>


<a href="result.php?action=get_my_photos" class="get_my_photos">Get my photos</a>
<a href="result.php?action=get_my_followed_people">Get people followed by me</a>
<a href="result.php?action=get_popular_photos">Get popular photos</a>
<a href="https://instagram.com/accounts/logout/">Logout</a>



<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

/*
console.log(access_token);

$('.get_my_photos').bind('click',function(){
var url = 'https://api.instagram.com/v1/users/self/feed?access_token='+access_token;
$.getJSON(url,function(response){
console.log(response);
});
});


$('.get_people_followed').bind('click',function(){
var url = 'https://api.instagram.com/v1/users/self/feed?access_token='+access_token;
$.getJSON(url,function(response){
console.log(response);
});
});
*/
});
</script>

</body>
</html>