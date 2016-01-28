function competitionDescription(competition){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
			  document.getElementById("competition_description").innerHTML=mypostrequest.responseText
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	
	var parameters = "id=" + competition;
	mypostrequest.open("POST", "controllers/log/competitions/detailAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}