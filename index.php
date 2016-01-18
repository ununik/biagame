<?php
include '../models/config.php';
include 'models/config.php';
function __autoload($name)
{
	include_once "models/classes/$name.class.php";
}
if(isset($_COOKIE["BIAGAME"])){
	$cookies = explode ("_;_", $_COOKIE["BIAGAME"]);
	$profil = new Profil($cookies[0], $cookies[1]);
} else{
	$profil = new Profil();	
}

$html = new HTML();

if($profil->log == false)
{
	include 'controllers/home.php';
}else{
	if(isset($_GET['page']) && $_GET['page']!="")
	{
		$html->setGetPage(safeText($_GET['page']));
	}
	if(file_exists ("controllers/log/{$html->getGetPage()}.php")){
		include "controllers/log/{$html->getGetPage()}.php";
	}else{
		include "controllers/noPageFound.php";
	}
}


print (include('views/page.php'));