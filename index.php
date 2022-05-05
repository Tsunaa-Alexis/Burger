<?php

$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT']."/3W/Burger";

include('fonctions/main.php');

//CONFIGURATION LISTING RESULTATS
$config_resultsParPageDefaut = 20;
$config_resultsParPage = array(10,20,30,50,100,150,1000);

if(!isset($_GET['action'])){ $_GET['action'] = ""; include('home.php'); }
if($_GET['action'] === 'inscription'){ include('inscription.php'); }
if($_GET['action'] === 'login'){ include('login.php');}
if($_GET['action'] === 'composition'){ include('./modules/composition/composition.php'); }
if($_GET['action'] === 'listeIngredients'){ include('./modules/ingredients/ingredient.php'); }


?>