<?php
$html->addScript('<script src="js/store.js"></script>');


$store = new Store();
$html->addContent('<h1>Obchod</h1>');
$html->addContent('<div id="status"></div>');
$html->addContent(include 'views/store/navigation.php');
$html->addContent('<div id="storePageContent"></div>');