<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
require_once('simple_html_dom.php');

$html = file_get_html('http://www.google.com');
echo $html; 

?>