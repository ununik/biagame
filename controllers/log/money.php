<?php
$html->addScript('<script src="js/jobs.js"></script>');


$jobs = new Job();
$html->addContent('<h1>Banka</h1>');
$html->addContent("<div id='status'></div>");
$html->addContent(include 'views/money/jobs.php');