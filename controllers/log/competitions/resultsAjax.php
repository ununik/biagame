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

$container = '<table border="1px">';
$n = 0;
foreach($competitions->getResultList($_POST['id']) as $list)
{
	$n++;
	$container .= "<tr><td>$n</td><td>{$list['user']}</td><td>{$list['prone']}</td><td>{$list['standing']}</td><td>{$list['time_points']}</td></tr>";
}

$container .= '</table>';

print $container;