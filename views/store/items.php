<?php
$container = '';
foreach ($store->getAllItemsByCategoryAndLevel($_POST['id'], $profil->getLevel()) as $item)
{
	$container .= "<div>";
		$container .= "<h4>{$item['name']} ({$item['firma']})</h4>";
		$container .= "<p>{$item['description']}</p>";
		$container .= "<div>cena: {$item['price']}EUR</div>";
		if($profil->getMoney() >= $item['price']){
			$container .= "<span onclick='buyItem(\"{$item['id']}\")'>koupit</span>";
		}else{
			$container .= "nedostatek peněz";
		}
	$container .= "</div>";
}

return $container;