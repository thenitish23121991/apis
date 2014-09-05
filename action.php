<?php
require_once('Init.php');

$action = "";
$social_arr = array();

if(isset($_POST['action']) && !empty($_POST['action'])){

$action = $_POST['action'];

switch($action){

case 'add_facebook_user':
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$f_id = $_POST['f_id'];
$social_arr = $user->add_user($first_name,$last_name,$f_id);
return $social_arr;
break;

case 'add_instagram_user':
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$i_id = $_POST['i_id'];
$social_arr = $user->add_user($first_name,$last_name,'',$i_id);
return $social_arr;
break;

case 'add_twitter_user':
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$t_id = $_POST['t_id'];
$social_arr = $user->add_user($first_name,$last_name,'','',$t_id);
return $social_arr;
break;

case 'add_foursquare_user':
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$fo_id = $_POST['fo_id'];
$social_arr = $user->add_user($first_name,$last_name,'','','',$fo_id);
return $social_arr;
break;


}

}


?>