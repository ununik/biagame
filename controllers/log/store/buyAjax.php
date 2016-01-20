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
$store = new Store();

$item = $store->getItemById($_POST['id'], $profil->getLevel());

if($profil->getMoney() < $item['price']){
	$err[] = 'Nedostatek peněz';
}
if(count($err) < 1){
	$money = $profil->getMoney() - $item['price'];

	$store->buyItem($item['id'], $profil->getId(), $money);

	echo 'Koupeno';
	return;
}

foreach ($err as $err)
{
	echo "<div>$err</div>";
}