<?php
$container = '';
foreach ($store->getNavigation() as $navigation)
{
	$container .= "<div onclick='openStorePage(\"{$navigation['id']}\")'>{$navigation['title']}</div>";
}

return $container;