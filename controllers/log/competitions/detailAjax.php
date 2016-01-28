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

$competition = new Competition();
$competition = $competition->getCompetition($profil->getId(), $profil->getLevel());

$container = "<h3>{$competition['title']}</h3>";
$container .= "<p>{$competition['description']}</p>";
$container .= "<div>startovné: {$competition['start_price']} EUR</div>";
$date = date('j. n. Y - H:i:s', $competition['date']);
$container .= "<div>start: $date</div>";
$container .= "<div id='registrationToCompetition'>Přihlásit se na závod</div>";

print $container;