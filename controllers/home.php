<?php
$html->addScript('<script src="js/ajax.js"></script>');
$html->addScript('<script src="js/registration.js"></script>');

$html->addContent("<div id='status'></div>");
$html->addContent(include('views/registration/form.php'));
$html->addContent(include('views/login/form.php'));
$html->addContent(include('views/game_show/basic.php'));