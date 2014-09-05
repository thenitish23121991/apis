<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
require_once('db_file.php');
require_once('User.php');


$user = new User($con);
$feed = new Feed($con);

?>