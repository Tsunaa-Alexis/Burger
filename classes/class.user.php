<?php
class User
{
	// Attributs
	private $_idUser;
	private $_nom;
	private $_prenom;
	private $_email;
	private $_password;
	

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

	// Getters

	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function getNom()
	{
		return $this->_nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function getEmail()
	{
		return $this->_email;
	}

	public function getPassword()
	{
		return $this->_password;
	}

	public function getNumTel()
	{
		return $this->_numTel;
	}

	// Setters

	public function setIdUser($idUser)
	{
		$idUser = (int) $idUser;
		if ($idUser > 0)
		{
			$this->_idUser = $idUser;
		}	
	}

	public function setNom($nom)
	{
		if(is_string($nom))
		{
			$this->_nom = $nom;
		}	
	}

	public function setPrenom($prenom){
		if(is_string($prenom))
		{
			$this->_prenom = $prenom;
		}	
	}
	
	public function setEmail($email)
	{
		$this->_email = $email;
	}

	public function setPassword($password)
	{
		$this->_password = $password;
	}

}
?>