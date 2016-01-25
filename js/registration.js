function registrationFormSend(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
	   document.getElementById("status").innerHTML=mypostrequest.responseText
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	var mail = document.getElementById('mail_registration').value
	var login = document.getElementById('login_registration').value
	var password = document.getElementById('password_registration').value
	document.getElementById('password_registration').value = '';
	var passwordAgain = document.getElementById('passwordAgain_registration').value
	document.getElementById('passwordAgain_registration').value = '';
	var rules = document.getElementById('rules_registration').checked;
	document.getElementById('rules_registration').checked = false;
	
	var parameters = "mail=" + mail + "&login=" + login + "&password=" + password + "&passwordAgain=" + passwordAgain + "&rules=" + rules; 
	mypostrequest.open("POST", "controllers/registrationAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}
function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function emailValidator(input){
	var email = input.value;
	if(validateEmail(email) == false){
		
		input.style.border = '1px solid red';
		return false;
	}
	return true;
}

function loginValidator(input){
	var login = input.value;
	if(login.length < 1){
		
		input.style.border = '1px solid red';
		return false;
	}
	return true;
}