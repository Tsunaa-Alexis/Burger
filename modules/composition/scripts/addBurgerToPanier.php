<?php

session_start();
if(!isset($_SESSION['idUser'])){ exit; }

include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/scripts/connectBDD.php");

function chargerClasse($classname){ require $_SERVER['DOCUMENT_ROOT'].'/3W/Burger/classes/class.'.$classname.'.php'; }
spl_autoload_register('chargerClasse');

$userManager = new UserManager($db);
$panierManager = new PanierManager($db);
$ingredientManager = new IngredientManager($db);
$burgerManager = new BurgerManager($db);

$retour = array();
$retour['panierAlreadyCreate'] = $panierManager->verifIfPanierExist($_SESSION['idUser']);

if(!$retour['panierAlreadyCreate']){
    $retour['createPanier'] = $panierManager->createPanier($_SESSION['idUser']);
    $retour['idPanier'] = $retour['createPanier']['id'];
}

if($retour['panierAlreadyCreate']){
    $retour['idPanier'] = $panierManager->recupPanierFromUser($_SESSION['idUser']);
}

$retour['ingredients'] = $ingredientManager->recupIngredients();

$burger = new Burger(['idPanier' => $retour['idPanier'], 'isCreatedByAdmin' => 0, 'img' => '']);
foreach($retour['ingredients'] as $ingredient){
    $burger->setIngredients($ingredient);
}

$retour['burger'] = $burger;

$retour['addBurgerToDB'] = $burgerManager->createBurger($burger);

$burger->setIdBurger($retour['addBurgerToDB']['idBurger']);

$retour['burgerModified'] = $burgerManager->suppIngredient($burger, 1);


header('Content-Type: application/json');
echo '<pre>'; print_r($retour);
echo "hello";
?>