<?php
function safeText($text)
{
	return htmlspecialchars(addslashes($text));
}
function validateEMAIL($EMAIL)
{
	$v = "/[a-zA-Z0-9-_.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";

	return (bool)preg_match($v, $EMAIL);
}