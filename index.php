<?php
include 'models/config.php';
function __autoload($name)
{
	include_once "models/classes/$name.class.php";
}
$html = new HTML();

if(!isset($_GET['search']))
{
	include 'controllers/home.php';
}


print (include('views/page.php'));