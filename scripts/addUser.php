<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Burger/scripts/connectBDD.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Burger/classes/class.userManager.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Burger/classes/class.user.php");

$userManager = new UserManager($db);

$userManager->sanitize($_POST, 'sql');

$retour['emailPresent'] = $userManager->emailExists($_POST['email']);

if(!$retour['emailPresent']){
    $user = new User(['nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)]); 
    $userManager->add($user);
}

header('Content-Type: application/json');
echo json_encode($retour);
?>