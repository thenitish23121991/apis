<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body>

<div class="container">
<button name="get_my_feed" class="get_my_feed">Get My Feed</button>
<button name="get_my_photos" class="get_my_photos">Get My Photos</button>
<button name="get_my_locations" class="get_my_locations">Get My Location Information</button>
<button name="get_my_friends" class="get_my_friends">Get My Friends</button>
<div class="my_activity">

</div>
</div>


<script type="text/javascript" src="jquery.min.js"></script>

  <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1445076445707428',
          status      : true,
          version    : 'v2.0',
		  cookie: true,
		  
        });
		

		
			  FB.getLoginStatus(function(response){
	  
	  if(response.status == 'connected'){
	  console.log('logged in');
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
		for(var j=0;j<response.data[j].images.length;j++){
	    $('.my_activity').append('<div class="activity"><div class="activity_story"><img src="'+response.data[i].images[j]['source']+'" /></div><div class="activity_time">'+response.data[i]['created_time']+'</div></div>');
		}

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
		
		FB.api('/me/friendlist',function(response){
		console.log(response);
		for(var i=0;i<response.data.length;i++){
		$('.my_activity').append('<div class="friend_name">'+response.data[i].name+'</div>');
		}
		});
		
		});
		
		
	  }else{
	  FB.login(function(response){

	  },{scope: 'read_stream,user_photos,user_status,manage_friendlists'});
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