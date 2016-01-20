<?php
$html->addScript('<script src="js/ajax.js"></script>');
$html->addScript('<script src="js/jobs.js"></script>');


$jobs = new Job();
$html->addContent("<div id='status'></div>");
$html->addContent(include 'views/money/jobs.php');