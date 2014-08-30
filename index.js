
$(document).ready(function(){

$('.facebook_logout_button').bind('click',function(){
FB.logout(function(){
location.href = 'index.php';
});
});

});