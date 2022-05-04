<?php
class Panier {

	// Attributs
	private $_idPanier;
	private $_user;
	private $_burgers;

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

    public function getIdPanier(){
		return $this->_idPanier;
	}
	
	public function getUser(){
		return $this->_user;
	}

	public function getBurgers(){
		return $this->_burgers;
	}

    public function setIdPanier($idPanier){
		$idPanier = (int) $idPanier;
		if ($idPanier > 0){
			$this->_idPanier = $idPanier;
		}	
	}

	public function setUser(User $user){
		$this->_user = $user;
	}

	public function setBurgers(Burger $burgers){
		$this->_burgers[] = $burgers;
	}

}

?>