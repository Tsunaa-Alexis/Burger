<?php
class Burger {

	// Attributs
	private $_idBurger;
	private $_idPanier;
	private $_isCreatedByAdmin;
	private $_img;
    private $_ingredients;

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach($donnees as $key => $value) {

			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

    public function getIdBurger(){
		return $this->_idBurger;
	}
	
	public function getIdPanier(){
		return $this->_idPanier;
	}

	public function getIsCreatedByAdmin(){
		return $this->_isCreatedByAdmin;
	}

	public function getImg(){
		return $this->_img;
	}

    public function getIngredients(){
		return $this->_ingredients;
	}

	public function setIdBurger($idBurger){
		$idBurger = (int) $idBurger;
		if ($idBurger > 0){
			$this->_idBurger = $idBurger;
		}	
	}

    public function setIdPanier($idPanier){
		$idPanier = (int) $idPanier;
		if ($idPanier > 0){
			$this->_idPanier = $idPanier;
		}	
	}

	public function setNom($isCreatedByAdmin){
		$this->_isCreatedByAdmin = $isCreatedByAdmin;
	}

	public function setImg($img){
		$this->_img = $img;
	}

    public function setIsCreatedByAdmin($isCreatedByAdmin){
		$this->_isCreatedByAdmin = $isCreatedByAdmin;
	}

    public function setIngredients(Ingredient $ingredients){
		$this->_ingredients[] = $ingredients;
	}

    public function suppIngredient($idIngredient){

        if(empty($this->_ingredients)){ return false; }

        foreach($this->_ingredients as $key => $ingredient){

            if($ingredient->getIdIngredient() == $idIngredient){
                unset($this->_ingredients[$key]);
                return false;
            }

        }

    }

}

?>