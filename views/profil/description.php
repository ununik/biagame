<?php
$container = '<table border="1px">';
$container .= "<tr>
		<td colspan='2'>{$profil->getFullNameWithLogin()}</td>
		</tr>";
$container .= "<tr>
		<td>pohlaví</td>
		<td>{$profil->getWholeGender()}</td>
		</tr>";
$container .= "<tr>
		<td>věk</td>
		<td>{$profil->getWholeAge()}</td>
		</tr>";
$container .= "<tr>
		<td>stát</td>
		<td>{$profil->getWordNationality()}</td>
		</tr>";

$container .= '</table>';

return $container;