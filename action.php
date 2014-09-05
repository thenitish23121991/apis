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
}

}


?>