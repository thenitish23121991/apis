

function add_facebook_user(first_name,last_name,f_id){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_facebook_user',first_name:first_name,last_name:last_name,f_id:f_id}
});

request.done(function(data12){
console.log(data12);
});

}


function add_instagram_user(first_name,last_name,i_id){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_instagram_user',first_name:first_name,last_name:last_name,i_id:i_id}
});

request.done(function(data12){
console.log(data12);
});

}


function add_twitter_user(first_name,last_name,t_id){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_twitter_user',first_name:first_name,last_name:last_name,t_id:t_id}
});

request.done(function(data12){
console.log(data12);
});

}


function add_foursquare_user(first_name,last_name,fo_id){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_foursquare_user',first_name:first_name,last_name:last_name,fo_id:fo_id}
});

request.done(function(data12){
console.log(data12);
});

}


function add_post(story,post_time,user_id,source){

var action = 'add_post';

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_post',post_time:post_time,user_id:user_id,source:source,story:story}
});

request.done(function(data12){
console.log(data12);
});

}

function add_friends_list(user_id,friend_id,source){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_friends_list',user_id:user_id,friend_id:friend_id,source:source}
});

request.done(function(data13){
console.log(data13);
});

}


function get_facebook_id(fb_id){

}