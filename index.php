<?php

$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT']."/3W/Burger";

if(!isset($_GET['action'])){ $_GET['action'] = ""; include('home.php'); }
if($_GET['action'] === 'inscription'){ include('inscription.php'); }
if($_GET['action'] === 'login'){ include('login.php'); }

?>