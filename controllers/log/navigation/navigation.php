<?php
	$html->addScript('<script src="js/ajax.js"></script>');
	$html->addScript('<script src="js/login.js"></script>');

	$html->addToNavigation('<a href="?page=profil">Profil</a>');
	$html->addToNavigation('<a href="?page=store">Obchod</a>');
	$html->addToNavigation('<span onclick="logout()">Odhlasit se</span>');