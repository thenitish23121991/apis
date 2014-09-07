<?php
session_start();
$code = "";
$access_token = "";

if(isset($_GET['code']) && !empty($_GET['code'])){
$code = $_GET['code'];
}


$_SESSION['code'] = $code;


$login_url = 'https://foursquare.com/oauth2/access_token?client_id=K2FDDKAO3KNK5Q0V1QCAPR2K02L0SEPOYO4ZMWS4AU0KM2M3&client_secret=AUHH5G3YSK0W2KT2ZFYLZ2KYBG52Y1BVISEY0RVF52SFXRRE&grant_type=authorization_code&redirect_uri=http://apis1.herokuapp.com/foursquare/redirect.php&code='.$_SESSION['code'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


curl_setopt($ch, CURLOPT_URL,$login_url);
$result=curl_exec($ch);
curl_close($ch);
$result_json = json_decode($result);

$access_token = $result_json->access_token;
echo $access_token;
$_SESSION['foursquare_access_token'] = $access_token;

echo $_SESSION['foursquare_access_token'];

/*

if(isset($_GET['action'])){


$action_ch = curl_init();
curl_setopt($action_ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($action_ch, CURLOPT_RETURNTRANSFER, true);

if($_GET['action'] == 'get_my_checkins'){
echo $_SESSION['access_token'];
$action_url = 'https://api.foursquare.com/v2/users/self/checkins?oauth_token='.$_SESSION['access_token'].'&v=20130815';
curl_setopt($action_ch, CURLOPT_URL,$action_url);
$action_result=curl_exec($action_ch);
curl_close($action_ch);
$action_result_json = json_decode($action_result);
}
else if($_GET['action'] == 'get_my_photos'){
//$action_url = ;
curl_setopt($action_ch, CURLOPT_URL,$action_url);
$action_result=curl_exec($action_ch);
curl_close($action_ch);
$action_result_json = json_decode($action_result);
}
}



print_r($action_result_json);
*/

?>


<!DOCTYPE html>
<html>
<head>
<title></title>

</head>

<body>

<script type="text/javascript">
var access_token = '<?php echo $_SESSION['foursquare_access_token'] ?>';
</script>


<a href="get_my_checkins.php">Get My Checkins</a>
<a href="get_my_pics.php">Get My Pics</a>
<a href="get_my_friends.php">Get My Friends</a>
<a href="https://foursquare.com/logout">Logout</a>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
/*
$.getJSON('https://api.foursquare.com/v2/users/self/checkins?oauth_token=access_token',function(response){
console.log(response);
});
*/
});
</script>

</body>
</html>