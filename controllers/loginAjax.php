<?php
print_r($_POST);
include '../models/config.php';
include '../models/helpers.php';
function __autoload($name)
{
	include_once "../models/classes/$name.class.php";
}
$err = array();
$login = safeText($_POST['login']);
$password = safeText($_POST['password']);
$loginCLASS = new Login();

if($loginCLASS->validateLogin != true){
	$err[] = "Špatné jméno nebo heslo!";
	foreach ($err as $err)
	{
		echo "<div>$err</div>";
		return;
	}
}else{
	setcookie("BIAGAME", $login.'_;_'.$password, time()+3600*7);
	echo 1;
	return;
}