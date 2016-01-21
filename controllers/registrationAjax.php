<?php
include '../models/config.php';
include '../models/helpers.php';
function __autoload($name)
{
	include_once "../models/classes/$name.class.php";
}
$err = array();
$mail = safeText($_POST['mail']);
$login = safeText($_POST['login']);
$password = safeText($_POST['password']);
$passwordAgain = safeText($_POST['passwordAgain']);
$rules = safeText($_POST['rules']);
$registration = new Registration();

//EMAIL
if(strlen($mail) < 1){
	$err[] = 'Není vyplněný mail!';
}else if(strlen($mail) > 255){
	$err[] = 'Příliš dlouhý mail!';
}else if($registration->checkEmptyMail($mail) != true){
	$err[] = 'Tento email už někdo používá!';
}

//LOGIN
if(strlen($login) < 1){
	$err[] = 'Není vyplněný login!';
}else if(strlen($login) > 255){
	$err[] = 'Příliš dlouhý login!';
}else{
	if(validateEMAIL($mail) != true){
		$err[] = 'Mail má špatný tvar!';
	}
}
if($registration->checkEmptyLogin($login) != true){
	$err[] = 'Tento login už někdo používá!';
}

//PASSWORD
if(strlen($password) < 1){
	$err[] = 'Není vyplněné heslo!';
}else if(strlen($password) > 40){
	$err[] = 'Příliš dlouhé heslo!';
}
if($password != $passwordAgain){
	$err[] = 'Heslo a ověření hesla se neschodují!';
}

if($rules == 'false'){
	$err[] = 'Musíte souhlasit s podmínkami!';
}

if(count($err) < 1){
	$registration->createUser($mail, $login, $password);
	echo 'Úspěšně registrováno. Nyní se lze přihlásit';
}

foreach ($err as $err)
{
	echo "<div>$err</div>";
}