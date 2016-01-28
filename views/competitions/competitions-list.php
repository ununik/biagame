<?php
$container = '<div id="competition_description"></div>';
foreach ($competition->getCompetitions($profil->getLevel()) as $competitionList)
{
	$container .= "<h4 onclick='competitionDescription(\"{$competitionList['id']}\")'>{$competitionList['title']}</h4>";
}

return $container;