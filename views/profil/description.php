<?php
$container = '<table id="profil_table">';
$container .= "<tr>
		<td colspan='2'>{$profil->getFullNameWithLogin()}</td>
		</tr>";
$container .= "<tr>
		<td>pohlaví:</td>
		<td>{$profil->getWholeGender()}</td>
		</tr>";
$container .= "<tr>
		<td>věk:</td>
		<td>{$profil->getWholeAge()}</td>
		</tr>";
$container .= "<tr>
		<td>stát:</td>
		<td>{$profil->getWordNationality()}</td>
		</tr>";
$container .= "<tr>
		<td>level:</td>
		<td>{$profil->getLevel()}</td>
		</tr>";

$container .= '</table>';

return $container;