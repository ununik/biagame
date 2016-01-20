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
print (include('../../../views/store/items.php'));