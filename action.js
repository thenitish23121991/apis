

function add_facebook_user(first_name,last_name,f_id){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:'add_facebook_user',first_name:first_name,last_name:last_name}
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


function add_post(){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:action,first_name:first_name,last_name:last_name}
});

request.done(function(data12){
console.log(data12);
});

}