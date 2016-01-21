<?php
$html->addScript('<script src="js/ajax.js"></script>');
$html->addScript('<script src="js/registration.js"></script>');
$html->addScript('<script src="js/login.js"></script>');

$html->addCss('<link rel="stylesheet" href="css/unlogHome.css" type="text/css">');
;
$html->addContent("<div id='home_forms'>");
$html->addContent("<div id='status'></div>");
$html->addContent(include('views/registration/form.php'));
$html->addContent(include('views/login/form.php'));
$html->addContent("</div>");
$html->addContent(include('views/game_show/basic.php'));