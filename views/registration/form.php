<?php
$container = '';
$container .= "<table id='registration_table'>";
$container .= "<tr>
		<td colspan='2'><h3>Registrace</h3></td>
		</tr>";
$container .= "<tr>
		<td><label for='mail_registration'>mail:</label></td>
		<td><input type='text' id='mail_registration' onkeypress='if (event.keyCode==13){ registrationFormSend();}'></td>
		</tr>";
$container .= "<tr>
		<td><label for='login_registration'>login:</label></td>
		<td><input type='text' id='login_registration' onkeypress='if (event.keyCode==13){ registrationFormSend();}'></td>
		</tr>";
$container .= "<tr>
		<td><label for='password_registration'>heslo:</label></td>
		<td><input type='password' id='password_registration' onkeypress='if (event.keyCode==13){ registrationFormSend();}'></td>
		</tr>";
$container .= "<tr>
		<td><label for='passwordAgain_registration'>ověření hesla:</label></td>
		<td><input type='password' id='passwordAgain_registration' onkeypress='if (event.keyCode==13){ registrationFormSend();}'></td>
		</tr>";
$container .= "<tr>
		<td colspan='2'><input type='checkbox' id='rules_registration'><label for='rules_registration'> souhlasím s podmínkami</label></td>
		</tr>";
$container .= "<tr>
		<td colspan='2'><input type='submit' value='registrovat'  onclick='registrationFormSend(); return flase'></td>
		</tr>";

$container .= "</table>";

return $container;