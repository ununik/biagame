<?php
$html->addScript('<script src="js/ajax.js"></script>');
$html->addScript('<script src="js/store.js"></script>');


$store = new Store();
$html->addContent('<div id="status"></div>');
$html->addContent(include 'views/store/navigation.php');
$html->addContent('<div id="storePageContent"></div>');