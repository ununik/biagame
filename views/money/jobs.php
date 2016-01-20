<?php
$container = "<h3>Brigády</h3>";
foreach ($jobs->getAllJobsToLevelAndExpierence($profil->getLevel(), $profil->getJobExpierence()) as $job)
{
	$container .= "<h4>{$job['name']}</h4>";

	$container .= "<h5>popis</h5><p>{$job['description']}</p>";

	if($profil->getActulaEnergy() >= $job['energy'])
	{
		$container .= "<span onclick='getJob(\"{$job['id']}\")'>Přijmout práci</span>";
	} else {
		$missingEnergy = $job['energy'] - $profil->getActulaEnergy();
		$container .= "Nedostatek energie - chybí $missingEnergy energie";
	}
}

return $container;