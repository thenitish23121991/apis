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
$source = $_POST['source'];
$social_arr = $user->add_user($first_name,$last_name,$source,$f_id);
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

case 'add_post':
$post = '';
$time = $_POST['post_time'];
$user_id = $_POST['user_id'];
$source = $_POST['source'];
if(isset($_POST['story'])){
$post = $_POST['story'];
}else{
$post = '';
}
$social_arr = $user->add_feed_item($post,$user_id,$time,$source);
return $social_arr;
break;


case 'get_facebook_id':
$fb_id = $_POST['fb_id'];
$social_arr = $user->get_facebook_id($fb_id);
return $social_arr;
break;


case 'add_friends_list':
$friend_id = $_POST['friend_id'];
$user_id = $_POST['user_id'];
$source = $_POST['source'];
$social_arr = $user->add_friends_list($user_id,$friend_id,$source);
return $social_arr;
break;
}

}


?>