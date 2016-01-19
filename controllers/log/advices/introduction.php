<?php
$html->addScript('<script src="js/ajax.js"></script>');
$html->addScript('<script src="js/introduction.js"></script>');

$nations = new Nations();

$listOfCountries = include 'views/advices/introduction-countrySelect.php';
$html->addContent("<div id='status'></div>");
$html->addContent(include('views/advices/introduction-form.php'));