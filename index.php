<?php
session_start();
require_once('simple_html_dom.php');
$url_name = "";
$html = "";
error_reporting(E_ALL);
ini_set('display_errors','1');

if(isset($_POST['url_name']) && !empty($_POST['url_name'])){
$_SESSION['url_name'] = $_POST['url_name'];


$html = file_get_html('http://www.facebook.com/'.$_SESSION['url_name'].'/friends');

print_r($html);

}



?>


<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="style.css" href="style.css" />
</head>

<body>

<script type="text/javascript">
var url_name =  <?php echo json_encode($_SESSION['url_name']); ?> ;
console.log(url_name);
</script>

<div class="lightbox">
<div class="lightbox_modal">
<form action="index.php" method="post">
<input type="text" name="url_name" class="url_name" />
<input type="submit" name="url_submit" class="url_submit" value="Submit" />
</form>
</div>
</div>

<div class="container">
<div class="container_buttons">
<button name="get_my_feed" class="get_my_feed">Get My Feed</button>
<button name="get_my_photos" class="get_my_photos">Get My Photos</button>
<button name="get_my_locations" class="get_my_locations">Get My Location Information</button>
<button name="get_my_friends" class="get_my_friends">Get My Friends</button>
<button class="facebook_logout_button">Logout</button>
</div>
<div class="my_activity">

</div>
</div>


<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="index.js"></script>
  <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1445076445707428',
          status      : true,
          version    : 'v2.0',
		  cookie: true,
		  
        });
		
		
		function get_friends(){
		location.href = 'http://www.facebook.com/'+url_name+'/friends/';
		}
		

		
			  FB.getLoginStatus(function(response){
	  
	  if(response.status == 'connected'){
	  console.log('logged in');
	  
	  if(typeof url_name == "undefined"){
	  $('.lightbox').addClass('open');
	  }else{
	  console.log(url_name);
	  }
	
	  
	  FB.api('/me',function(response){
	  console.log(response);
	  $('.container_buttons').append('<a class="my_link_button" href="'+response.link+'">My Friends Page</a>');
	  });
	  
	  FB.api('/me/feed',function(response){
	  console.log(response);
	  for(var i=0;i<response.data.length;i++){
	  $('.my_activity').append('<div class="activity"><div class="activity_story">'+response.data[i]['story']+'</div><div class="activity_time">'+response.data[i]['created_time']+'</div></div>');
	  }
	  });
	  
	  		$('.get_my_photos').bind('click',function(){
		
		FB.api('/me/photos',function(response){
		console.log(response);
				$('.my_activity').html('');
		for(var i=0;i<response.data.length;i++){
	    $('.my_activity').append('<div class="activity"><div class="activity_story"><img src="'+response.data[i]['source']+'" /></div><div class="activity_time">'+response.data[i]['created_time']+'</div></div>');
		}

		});
		
		});
		
		
		$('.get_my_locations').bind('click',function(){
				$('.my_activity').html('');
		FB.api('/me/feed?with=location',function(response){
		
		console.log(response);
		});
		});
		
		$('.get_my_friends').bind('click',function(){
		$('.my_activity').html('');
		
		FB.api('/me',function(response){
		console.log(response);
		
		});
		
		});
		
		
	  }else{
	  FB.login(function(response){

	  },{scope: 'read_stream,user_photos,user_status,manage_friendlists,user_friends'});
	  }
	  
	  });
		
      };
	  
	  


      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "http://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>