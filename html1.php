<?php 
require_once('simple_html_dom.php');

$html = file_get_html('http://www.google.com');
echo $html; 

?>