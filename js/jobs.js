function getJob(id){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		  if(mypostrequest.responseText == 1){  
			  location.reload();
		  } else{
			  document.getElementById("status").innerHTML=mypostrequest.responseText
		  }
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	
	var parameters = "id=" + id;
	mypostrequest.open("POST", "controllers/log/job/getJobAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}