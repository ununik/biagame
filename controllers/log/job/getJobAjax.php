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
$job =  new Job();

$activeJob = $job->getJobById(safeText($_POST['id']), $profil->getLevel(), $profil->getJobExpierence());

if($profil->getActulaEnergy() < $activeJob['energy']){
	$err[] = 'Nedostatek energie!';
}

if(count($err) < 1){
	$energy = $profil->getActulaEnergy() - $activeJob['energy'];
	$money = $profil->getMoney() + $activeJob['money'];
	$newJobExperience = $profil->getJobExpierence() + $activeJob['addExpierence'];

	$job->doJob($energy, $activeJob['energy'], $activeJob['id'], $profil->getId(), $money, $newJobExperience);

	echo 1;
	return;
}

foreach ($err as $err)
{
	echo "<div>$err</div>";
}