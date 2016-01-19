<?php
include '../../../models/config.php';
include '../../../models/helpers.php';
function __autoload($name)
{
	include_once "../../../models/classes/$name.class.php";
}
session_start();

$profil = new Profil($_SESSION['profil_id']);
$err = array();

//FIRSTNAME
$firstname = safeText($_POST['firstname']);
if(strlen($firstname) < 1){
	$err[] = "Není vyplněné jméno!";
}elseif(strlen($firstname) > 255){
	$err[] = "Vyplněné jméno je příliš dlouhé!";
}

//LASTNAME
$lastname = safeText($_POST['lastname']);
if(strlen($lastname) < 1){
	$err[] = "Není vyplněné příjmení!";
}elseif(strlen($lastname) > 255){
	$err[] = "Vyplněné příjmení je příliš dlouhé!";
}

//GENDER
$gender = safeText($_POST['gender']);
if($gender != "m" && $gender != "f"){
	$err[] = "Není vyplněné pohlaví!";
}

//NATIONALITY
$nationality = safeText($_POST['nationality']);
if(!is_numeric ($nationality)){
	$err[] = "Není vyplněný stát!";
}

//AGE
$age = safeText($_POST['age']);
if(!is_numeric ($age)){
	$err[] = "Věk musí být číselný údaj!";
}
if($age > 150 || $age <1){
	$err[] = "Divný věk $age!";
}

if(count($err) < 1){
	$profil->introductionUpdate($firstname, $lastname, $gender, $age, $nationality);
	echo 1;
	return;
}

foreach ($err as $err)
{
	echo "<div>$err</div>";

}
return;