function openStorePage(id){
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
			  document.getElementById("storePageContent").innerHTML=mypostrequest.responseText
			  document.getElementById("status").innerHTML='';
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	
	var parameters = "id=" + id;
	mypostrequest.open("POST", "controllers/log/store/pageAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}

function buyItem(id){
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
	
	var parameters = "id=" + id;
	mypostrequest.open("POST", "controllers/log/store/buyAjax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}