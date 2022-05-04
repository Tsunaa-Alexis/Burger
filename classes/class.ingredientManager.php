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

    public function recupIngredients(){

        $allResults = array();

        $q= $this->_db->prepare('SELECT * FROM ingredients');
		$q->execute();
		$ingredients = $q->fetchAll(PDO::FETCH_ASSOC);
        
		foreach($ingredients as $ingredient){
            
            $allResults[] = new Ingredient($ingredient);
        }	

		return $allResults;

    }

}

?>