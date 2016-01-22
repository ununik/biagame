<?php
$container = '<div id="myItems">Me vybaveni';
foreach($equipment->getAllItemsOnePlusNumber($profil->getId()) as $item)
{
	$container .= "<div>{$item['name']}";
	if($item['count'] > 1) $container .= " ({$item['count']})";
	$container .= "</div>";
}
$container .= "</div>";
return $container;