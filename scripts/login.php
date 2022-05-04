<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Burger/scripts/connectBDD.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Burger/classes/class.userManager.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Burger/classes/class.user.php");

$userManager = new UserManager($db);

$retour = $userManager->verifLoginInfos($_POST['email'], $_POST['password']);
if($retour){
    $utilisateur = $userManager->getUser($_POST['email']);
    session_start ();
    $_SESSION['login'] = true;
    $_SESSION['userNom'] = $utilisateur->getNom();
    $_SESSION['userPrenom'] = $utilisateur->getPrenom();
    $_SESSION['Email'] = $utilisateur->getEmail();
    $_SESSION['idUser'] = $utilisateur->getIdUser();
}  

header('Content-Type: application/json');
echo json_encode($retour);
?>