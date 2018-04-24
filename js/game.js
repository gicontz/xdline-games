var mission_mode = "";
var difficulty = "";

$(document).ready(function(){

/****************************
LOGIN
*****************************/

var mission_num = 0;

$("#mission-1").click(function(){
	mission_num = 1;
});

$("#mission-2").click(function(){
	mission_num = 2;
});


$(".btn-modals").click(function(){
	$('.alert').hide();
});

$('.alert').hide();

$('.form-signin').submit(function(e){
	e.preventDefault();
	var d = new Object();
	d['username'] = $("#un").val();
	d['password'] = $("#pw").val();

	$.post("login.php", {
		data: d},
		function(callback){   
	      // var subload = JSON.parse(callback);   
	      if(callback == "SUCCESS"){
	      	window.open('game.php?page=mission', '_self');
	      }else{
	      	$('.alert').show();	      	
	      }
	  }
	  );
});

$('.form-orgsignin').submit(function(e){
	e.preventDefault();
	var pw = $("#orgpass").val();

	if(pw == "XDLGAMES2018"){
		$.post("orgpass.php", {},
			function(callback){}
	  );
		window.open('game.php?page=mission' + mission_num, '_self');
	}else{
		$('.modal-footer .btn-danger').click();
	}
});

});