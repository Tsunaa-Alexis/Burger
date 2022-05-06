

<?php

include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/scripts/connectBDD.php");
include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/classes/class.ingredientManager.php");
include_once($_SERVER['DOCUMENT_ROOT']."/3W/Burger/classes/class.ingredient.php");

$ingredientManager = new IngredientManager($db);

$retour = 'Echec Suppression';
// supp ingredient
if (!empty($_POST['idIngredient'])) {
    $retour = $ingredientManager->suppIngredient($_POST['idIngredient']);
    
    if ($retour) {
        $retour = 'supp success';
    }
    else{
        $retour = 'supp imposible';
    }
}

header('Content-Type: application/json');
echo json_encode($retour);
?>