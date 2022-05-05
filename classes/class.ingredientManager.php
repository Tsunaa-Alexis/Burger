<?php
class IngredientManager {
	
	private $_db;

	public function __construct($db){
		$this->setDB($db);
	}

    // initialisation de la db
	public function setDb(PDO $db){
		$this->_db = $db;
	}

    public function recupIngredients($debut = '', $limite = '', $order = ''){

        $allResults = array();
        $allResults['result'] = array();
        $allResults['numRows'] = 0;

		$limit = "";
        if($debut !== '' && $limite !== ''){
            $limit = " LIMIT ".$debut.",".$limite;
        }

        $q= $this->_db->prepare('SELECT * FROM ingredients '.$order.$limit);
		$q->execute();
		$ingredients = $q->fetchAll(PDO::FETCH_ASSOC);

		$q= $this->_db->prepare('SELECT COUNT(*) FROM ingredients');
		$q->execute();
		$allResults['numRows'] = $q->fetchColumn();
        
		foreach($ingredients as $ingredient){ 
            $allResults['result'][] = new Ingredient($ingredient);
        }	

		return $allResults;

    }

	public function suppIngredient($idIngredient){

		$q= $this->_db->prepare('SELECT  idIngredient FROM burger_ingredients WHERE idIngredient = :id');
		$q->bindValue(':id', $idIngredient);
		$q->execute();
		$ingredientInfo = $q->fetch(PDO::FETCH_ASSOC);

		if ($ingredientInfo){
			return false;
		}	

		$q= $this->_db->prepare('DELETE FROM ingredients WHERE idIngredient = ?');
		$q->execute([$idIngredient]);
		return true;
	}


}

?>