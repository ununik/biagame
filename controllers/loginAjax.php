<?php
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

if($loginCLASS->validateLogin($login, $password) != true){
	$err[] = "Špatné jméno nebo heslo!";
	foreach ($err as $err)
	{
		echo "<div>$err</div>";
		return;
	}
}else{
	echo 1;
	return;
}