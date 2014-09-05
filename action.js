

function add_user(first_name,last_name,action){

var request = $.ajax({
url:"action.php",
type:"POST",
data:{action:action,first_name:first_name,last_name:last_name}
});

request.done(function(data12){
console.log(data12);
});

}