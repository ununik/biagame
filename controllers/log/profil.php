<?php
$html->addCss('<link rel="stylesheet" href="css/profil.css" type="text/css">');
$equipment = new Equipment();

$html->addContent(include ('views/profil/description.php'));
$html->addContent(include ('views/profil/equipment.php'));
$html->addContent(include ('views/profil/myItems.php'));