<?php
$container = '<div id="results"></div>';

foreach ($competition->getDoneCompetitionWithUser($profil->getId()) as $results)
{
	foreach ($results as $result)
	{
		$container .= "<h4 onclick='getResults(\"{$result['id']}\")'>{$result['title']}</h4>";
	}
}

return $container;