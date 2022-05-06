<?php

include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/scripts/connectBDD.php");
include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/classes/class.ingredientManager.php");
include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/classes/class.ingredient.php");
include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/classes/class.categorie.php");
include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/classes/class.categorieManager.php");

$ingredientManager = new IngredientManager($db);
$categorieManager = new CategorieManager($db);

$ingredient = new Ingredient(['nom' => $_POST['nom'], 'prix' => $_POST['prix'], 'isVegetarien' => $_POST['isVegetarien'], 'categorie' => $categorieManager->getOneCategorie($_POST['categorie']), 'img'=>'']); 
$ingredientManager->addIngredient($ingredient);

header('Content-Type: application/json');
// echo json_encode($retour);
?>