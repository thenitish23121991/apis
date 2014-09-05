<?php

class User{

private $db;

public function __construct($db){
$this->db = $db;
}

public function add_user($first_name,$last_name,$f_id='',$i_id='',$t_id='',$fo_id=''){
$user_arr = array();
try{
$query = "INSERT INTO `apis_users`(first_name,last_name,f_id,i_id,t_id,fo_id) VALUES(?,?,?,?,?,?)";
$sql = $this->db->prepare($query);
$sql->execute(array($first_name,$last_name,$f_id,$i_id,$t_id,$fo_id));
$sqlnum = $sql->rowCount();
if($sqlnum > 0){
$user_arr['result'] = "success";
}else{
$user_arr['result'] = "nosuccess";
}
}
catch(PDOException $e){
$e->getMessage();
}
return $user_arr;
}


public function add_feed_item($user_id,$source,$link,$location,$post_friends){
$user_arr = array();
try{
$query = "INSERT INTO `apis_users`(first_name,last_name,f_id,i_id,t_id,fo_id) VALUES(?,?,?,?,?,?)";
$sql = $this->db->prepare($query);
$sql->execute(array($first_name,$last_name,$f_id,$i_id,$t_id,$fo_id));
$sqlnum = $sql->rowCount();
if($sqlnum > 0){
$user_arr['result'] = "success";
}else{
$user_arr['result'] = "nosuccess";
}
}
catch(PDOException $e){
$e->getMessage();
}
return $user_arr;
}



public function add_friends_list($user_id,$friend_id){
$user_arr = array();
try{
$query = "INSERT INTO `apis_friends`(user_id,friend_id) VALUES(?,?,)";
$sql = $this->db->prepare($query);
$sql->execute(array($user_id,$friend_id));
$sqlnum = $sql->rowCount();
if($sqlnum > 0){
$user_arr['result'] = "success";
}else{
$user_arr['result'] = "nosuccess";
}
}
catch(PDOException $e){
$e->getMessage();
}
return $user_arr;
}





}


?>