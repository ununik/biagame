<?php
$container = '';
$container .= "<table border='1px'>";
$container .= "<tr>
		<td colspan='2'><h3>Login</h3></td>
		</tr>";
$container .= "<tr>
		<td><label for='login_registration'>login</label></td>
		<td><input type='text' id='login_registration'></td>
		</tr>";
$container .= "<tr>
		<td><label for='password_registration'>heslo</label></td>
		<td><input type='text' id='password_registration'></td>
		</tr>";
$container .= "<tr>
		<td colspan='2'><input type='submit' value='přihlásit se'></td>
		</tr>";

$container .= "</table>";

return $container;