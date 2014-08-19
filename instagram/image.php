<?php
session_start();

$image_id = "";
if(isset($_GET['id']) && !empty($_GET['id'])){
$image_id = $_GET['id'];

if(isset($_POST['form_text'])){
$comment = $_POST['form_text'];
}

$url = 'https://api.instagram.com/v1/media/'.$image_id.'?access_token='.$_SESSION['access_token'];

$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$pictures = curl_exec($curl);
		curl_close($curl);

		$pics = json_decode($pictures,true);
		echo '<img src="'.$pics['data']['images']['standard_resolution']['url'].'" />';
		
		echo '<div>Comments:</div>';
		
		foreach($pics['data']['comments']['data'] as $p){
		echo '<div>'.$p['text'].'</div><br/>';
		}
		
		echo '<form action="image.php?id='.$image_id.'" method="post">
		<input type="text" name="form_text" placeholder="Add a comment..." />
		</form>';
		
}



?>