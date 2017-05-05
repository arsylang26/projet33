<?php

// Contsrôleur frontal : instancie un routeur pour traiter la requête entrante

require 'Framework/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();


