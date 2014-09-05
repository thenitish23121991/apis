<?php
require_once('db_file.php');
require_once('User.php');
require_once('Feed.php');

$user = new User($con);
$feed = new Feed($con);

?>