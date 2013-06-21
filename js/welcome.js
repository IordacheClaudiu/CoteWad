$(document).ready(function() {
	$("#login_username").blur(function() {
		var user = $("#login_username").val();
		var dataString = "user=" + user;
		$.ajax({
			type : "POST",
			url : "http://localhost/projects/CoteWad/index.php/login/exists",
			data : dataString,
			dataType : 'text',
			success : function(data) {
				if(data=="FALSE"){
					document.getElementById("exists").style.visibility="visible";
					document.getElementById("button_lock").disabled=true;
				}else{
					document.getElementById("exists").style.visibility="hidden";
					document.getElementById("button_lock").disabled=false;
				}
			}
		});
	});
	$("#register_username").blur(function() {
		var user = $("#register_username").val();
		var dataString = "user=" + user;
		$.ajax({
			type : "POST",
			url : "http://localhost/projects/CoteWad/index.php/login/exists",
			data : dataString,
			dataType : 'text',
			success : function(data) {
				if(data=="TRUE"){
					document.getElementById("exists").style.visibility="visible";
					document.getElementById("button_lock").disabled=true;
				}else{
					document.getElementById("exists").style.visibility="hidden";
					document.getElementById("button_lock").disabled=false;
				}
			}
		});
	});
	
	$("#register_email").blur(function() {
		var email = $("#register_email").val();
		var dataString = "email=" + email;
		$.ajax({
			type : "POST",
			url : "http://localhost/projects/CoteWad/index.php/register/exists_email",
			data : dataString,
			dataType : 'text',
			success : function(data) {
				if(data=="TRUE"){
					document.getElementById("exists_email").style.visibility="visible";
					document.getElementById("button_lock").disabled=true;
				}else{
					document.getElementById("exists_email").style.visibility="hidden";
					document.getElementById("button_lock").disabled=false;
				}
			}
		});
	});
	
}); 