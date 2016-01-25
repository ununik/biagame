<?php
$container = '';
foreach ($reality->getRealitiesOrderByPrice($profil->getLevel()) as $item)
{
	$container .= "<div>{$item['title']}</div>";
}

return $container;