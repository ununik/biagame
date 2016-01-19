function loginFormSend(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  if(mypostrequest.responseText == 1){  
			  login = document.getElementById('login_login').value
			  password = document.getElementById('password_login').value;
			  
			  document.cookie = "BIAGAME="+login+"-*-"+password;
			  
			  
			  location.reload();
		  } else{
			  document.getElementById('password_login').value = '';
			  document.getElementById("status").innerHTML=mypostrequest.responseText
		  }
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	var login = document.getElementById('login_login').value
	var password = document.getElementById('password_login').value
	
	var parameters = "login=" + login + "&password=" + password;
	mypostrequest.open("POST", "controllers/loginAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}

function logout(){
	document.cookie = "BIAGAME=";
	
	
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){			  
		  location.reload();
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	
	var parameters = "";
	mypostrequest.open("POST", "controllers/logoutAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}