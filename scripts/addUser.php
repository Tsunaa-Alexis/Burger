<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Burger/scripts/connectBDD.php");
include_once($_SERVER['DOCUMENT_ROOT']."/classes/class.UserManager.php");
include_once($_SERVER['DOCUMENT_ROOT']."/classes/class.User.php");

$userManager = new UserManager($db);

$retour['emailPresent'] = $userManager->emailExists($_POST['mail']);

if(!$retour['emailPresent']){
    $user = new User(['nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_BCRYPT), 'type' => "USER", 'numTel' => $_POST['numTel']]); 
    $userManager->add($user);
}

header('Content-Type: application/json');
echo json_encode($retour);
?>