<?php
$container = '';
$container .= "<table border='1px'>";
$container .= "<tr>
		<td colspan='3'><h3>Osobní údaje sportovce</h3></td>
		</tr>";
$container .= "<tr>
		<td>Pohlaví</td>
		<td><input type='radio' id='gender-m_intro' name='gender' checked='checked'><label for='gender-m_intro'>muž</label></td>
		<td><input type='radio' id='gender-f_intro' name='gender'><label for='gender-f_intro'>žena</label></td>
		</tr>";
$container .= "<tr>
		<td><label for='firstname_intro'>Jméno</label></td>
		<td colspan='2'><input type='text' id='firstname_intro'></td>
		</tr>";
$container .= "<tr>
		<td><label for='lastname_intro'>Příjmení</label></td>
		<td colspan='2'><input type='text' id='lastname_intro'></td>
		</tr>";
$container .= "<tr>
		<td><label for='age_intro'>Věk</label></td>
		<td colspan='2'><input type='text' id='age_intro'></td>
		</tr>";
$container .= "<tr>
		<td><label for='nationality_intro'>Stát</label></td>
		<td colspan='2'><select id='nationality_intro'>$listOfCountries</select></td>
		</tr>";
$container .= "<tr>
		<td colspan='3'><input type='submit' value='uložit' onclick='saveIntro()'></td>
		</tr>";

$container .= "</table>";

return $container;