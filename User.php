<?php

class User{

private $db;

public function __construct($db){
$this->db = $db;
}

public function add_user($first_name,$last_name,$source,$f_id='',$i_id='',$t_id='',$fo_id=''){
$user_arr = array();
$user_result = $this->is_user_present($first_name,$last_name,$source);
if($user_result['result'] == 'no'){
try{
$query = "INSERT INTO `users`(first_name,last_name,source,f_id,i_id,t_id,fo_id) VALUES(?,?,?,?,?,?,?)";
$sql = $this->db->prepare($query);
$sql->execute(array($first_name,$last_name,$source,$f_id,$i_id,$t_id,$fo_id));
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


public function is_user_present($first_name,$last_name,$source){
$user_arr = array();
try{
$query = "SELECT * FROM `users` WHERE first_name=? AND last_name=? AND source=?";
$sql = $this->db->prepare($query);
$sql->execute(array($first_name,$last_name,$source));
$sqlnum = $sql->rowCount();
if($sqlnum > 0){
$user_arr['result'] = 'yes';
}else{
$user_arr['result'] = 'no';
}
}
catch(PDOException $e){
$e->getMessage();
}
return $user_arr;
}


public function add_feed_item($post,$user_id,$post_time,$source,$link='',$location='',$post_friends=''){
$user_arr = array();
try{
$query = "INSERT INTO `posts`(post,user_id,source,post_time) VALUES(?,?,?,?)";
$sql = $this->db->prepare($query);
$sql->execute(array($post,$user_id,$source,$post_time));
$sqlnum = $sql->rowCount();
echo $sqlnum;
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



public function add_friends_list($user_id,$friend_id,$source){
$user_arr = array();
try{
$query = "INSERT INTO `friends`(user_id,friend_id,source) VALUES(?,?,?)";
$sql = $this->db->prepare($query);
$sql->execute(array($user_id,$friend_id,$source));
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


public function get_facebook_id($fb_id){
$user_id = "";
echo $fb_id;
try{
$query = "SELECT * FROM `users` WHERE f_id=?";
$sql = $this->db->prepare($query);
$sql->execute(array($fb_id));
$sqlnum = $sql->rowCount();
if($sqlnum > 0){
while($data = $sql->fetch(PDO::FETCH_ASSOC)){
$user_id = $data['id'];
}
}else{
$user_id = "not found";
}
}
catch(PDOException $e){
$e->getMessage();
}
return $user_id;
}


}


?>