function saveIntro(){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  if(mypostrequest.responseText == 1){
			  
			  location.reload();
			  
		  }else{
			  document.getElementById("status").innerHTML=mypostrequest.responseText
		  }
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	var firstname = document.getElementById('firstname_intro').value
	var lastname = document.getElementById('lastname_intro').value
	var age = document.getElementById('age_intro').value
	if(document.getElementById('gender-m_intro').checked==true){
		var gender = "m"
	}else{
		var gender = "f"
	} 
	var nationality = document.getElementById('nationality_intro').value
	
	var parameters = "firstname=" + firstname + "&lastname=" + lastname + "&age=" + age + "&gender=" + gender + "&nationality=" + nationality;
	mypostrequest.open("POST", "controllers/log/advices/introductionAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}