<?php
//MAN
$container = "<table border='1px'>";

//HEAD
	$container .= "<tr>";
		//GLASSES
		$container .= "<td></td>";
		//CAP
		$container .= "<td></td>";
		//EMPTY
		$container .= "<td></td>";
	$container.= "</tr>";

//MIDDLE BODY
	$container .= "<tr>";
		//RIGHT HAND (BELT)
		$container .= "<td></td>";
		//BODY (STARTNUMBER)
		$container .= "<td></td>";
		//LEFT HAND (WATCH)
		$container .= "<td></td>";
	$container .= "</tr>";

//LEGS
	$container .= "<tr><td colspan='3'></td></tr>";

//FEET (BOOTS)
	$container .= "<tr><td colspan='3'></td></tr>";

$container .= "</table>";


//OTHER
$container .= "<table border='1px'>";

//WEAPON
	$container .= "<tr><td></td></tr>";
//POLES
$container .= "<tr><td></td></tr>";
//SKI
	$container .= "<tr><td></td></tr>";

$container .= "</table>";


return $container;