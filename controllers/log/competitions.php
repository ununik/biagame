<?php
$html->addScript('<script src="js/competition.js"></script>');
$competition = new Competition();
$html->addContent(include 'views/competitions/competitions-list.php');