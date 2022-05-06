<?php
class Categorie
{
    private $_idCategorie;
    private $_nom;

    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
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
    public function setIdCategorie($idCategorie)
    {
      $idCategorie = (int) $idCategorie;
		if ($idCategorie > 0){
			$this->_idCategorie = $idCategorie;
		}	  
    }
    public function setNom($nom){
		$this->_nom = $nom;
	}
    public function getNom(){
		return $this->_nom;
	}
    public function getIdCategorie(){
		return $this->_idCategorie;
	}
}


?>