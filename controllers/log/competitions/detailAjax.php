<?php

include '../../../models/config.php';
include '../../../models/helpers.php';
function __autoload($name)
{
	include_once "../../../models/classes/$name.class.php";
}
session_start();
$err = array();
$profil = new Profil($_SESSION['profil_id']);

$competitions = new Competition();

if($competitions->userIsRegistratedOnCompetition($profil->getId(), $_POST['id']) == false) {
	if(isset($_POST['registrate']) && $_POST['registrate'] == 'true')
	{
		$competitions->registrateUserForCompetition($profil->getId(), $_POST['id']);
	}
}

$competition = $competitions->getCompetition($_POST['id'], $profil->getLevel());

$container = "<h3>{$competition['title']}</h3>";
$container .= "<p>{$competition['description']}</p>";
$container .= "<div>startovné: {$competition['start_price']} EUR</div>";
$date = date('j. n. Y - H:i:s', $competition['date']);
$container .= "<div>start: $date</div>";

if($competitions->userIsRegistratedOnCompetition($profil->getId(), $_POST['id']) == true)
{
	$container .= "<div id='registrationToCompetition' onclick='showStartlist(\"{$_POST['id']}\")'>Startovní listina</div>";
	$container .= "<div id='startList'></div>";
} else {
	$container .= "<div id='registrationToCompetition' onclick='registrateOnCompetition(\"{$_POST['id']}\")'>Přihlásit se na závod</div>";
}


print $container;