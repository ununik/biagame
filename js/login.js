function registrationFormSend(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  if(mypostrequest.responseText == '1'){ location.reload(); } else{
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
	document.getElementById('password_login').value = '';
	
	var parameters = "login=" + mail + "&password=" + password; 
	mypostrequest.open("POST", "controllers/loginAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}