<?php
include 'models/config.php';
include 'models/helpers.php';
function __autoload($name)
{
	include_once "models/classes/$name.class.php";
}
session_start();
if(!isset($_SESSION['profil_id']) || $_SESSION['profil_id']!=""){
	if(isset($_COOKIE["BIAGAME"]) && $_COOKIE["BIAGAME"]!=''){
		$cookies = explode ("-*-", $_COOKIE["BIAGAME"]);
		$profil = new Profil(0, $cookies[0], $cookies[1]);

	} else{
		$profil = new Profil();
	}
}else{
	$profil = new Profil($_SESSION['profil_id']);
}
$html = new HTML();

if($profil->log == false || $profil->getId() == 0)
{
	include 'controllers/home.php';
}else{
	if(isset($_GET['page']) && $_GET['page']!="")
	{
		$html->setGetPage(safeText($_GET['page']));
	}
	//ADVICES AND OTHER
	if($profil->introduction() == true){
		include "controllers/log/advices/introduction.php";
	}else{
		if(file_exists ("controllers/log/{$html->getGetPage()}.php")){
			include "controllers/log/{$html->getGetPage()}.php";
		}else{
			include "controllers/noPageFound.php";
		}

		include "controllers/log/navigation/navigation.php";
		include "controllers/log/panel/panel.php";
	}
}


print (include('views/page.php'));