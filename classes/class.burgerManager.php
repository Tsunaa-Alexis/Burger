<?php
class BurgerManager {
	
	private $_db;

	public function __construct($db){
		$this->setDB($db);
	}

    // initialisation de la db
	public function setDb(PDO $db){
		$this->_db = $db;
	}

    public function createBurger(Burger $burger){

        $retour = array();

        $q = $this->_db->prepare('INSERT INTO burger(idPanier, isCreatedByAdmin, img) VALUES(:idPanier, :isCreatedByAdmin, :img)');
		$q->bindValue(':idPanier', $burger->getIdPanier());
		$q->bindValue(':isCreatedByAdmin', $burger->getIsCreatedByAdmin());
		$q->bindValue(':img', $burger->getImg());

		$q->execute();

        $retour['idBurger'] = $this->_db->lastInsertId();

        $listOfIngredients = $burger->getIngredients();
        foreach($listOfIngredients as $ingredient){
            $this->addIngredientToBurger($retour['idBurger'], $ingredient->getIdIngredient());
        }

        return $retour;

    }

    private function addIngredientToBurger($idBurger, $idIngredient){

        $q = $this->_db->prepare('INSERT INTO burger_ingredients(idBurger, idIngredient) VALUES(:idBurger, :idIngredient)');
		$q->bindValue(':idBurger', $idBurger);
		$q->bindValue(':idIngredient', $idIngredient);

        $q->execute();

    }

    public function suppIngredient(Burger $burger, $idIngredient){

        if(empty($idIngredient)){ return false; }

        $burger->suppIngredient($idIngredient);

        $q = $this->_db->prepare('DELETE FROM burger_ingredients WHERE idBurger = :idBurger AND idIngredient = :idIngredient LIMIT 1');
        $q->bindValue(':idBurger', $burger->getIdBurger());
        $q->bindValue(':idIngredient', $idIngredient);

        $retour = $q->execute();

        return $burger;

    }

}

?>