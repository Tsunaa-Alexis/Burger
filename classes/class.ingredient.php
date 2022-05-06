<?php
class Ingredient
{
	// Attributs
	private $_idIngredient;
	private $_nom;
	private $_categorie;
	private $_prix;
	private $_img;
	private $_isVegetarien;

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

	public function getIdIngredient(){
		return $this->_idIngredient;
	}
	
	public function getNom(){
		return $this->_nom;
	}

	public function getCategorie(){
		return $this->_categorie;
	}

	public function getPrix(){
		return $this->_prix;
	}

	public function getImg(){
		return $this->_img;
	}

	public function getIsVegetarien(){
		return $this->_isVegetarien;
	}

	public function setIdIngredient($idIngredient){
		$idIngredient = (int) $idIngredient;
		if ($idIngredient > 0){
			$this->_idIngredient = $idIngredient;
		}	
	}

	public function setNom($nom){
		$this->_nom = $nom;
	}

	public function setCategorie(Categorie $categorie){
		$this->_categorie = $categorie;
	}

	public function setPrix($prix){
		$this->_prix = $prix;
	}

	public function setImg($img){
		$this->_img = $img;
	}

	public function setIsVegetarien($isVegetarien){
		$this->_isVegetarien = $isVegetarien;
	}
}

?>