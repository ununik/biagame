<?php

$html->addHeader("<a>Level {$profil->getLevel()}</a>");
$html->addHeader("<a>Energie {$profil->getFullEnergyAndMaxEnergy()}</a>");
$html->addHeader("<a href='?page=money'><div>{$profil->getFullMouney()}</div></a>");
