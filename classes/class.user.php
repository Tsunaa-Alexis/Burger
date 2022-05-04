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

	public function getId()
	{
		return $this->_id;
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

	public function setId($id)
	{
		$id = (int) $id;
		if ($id > 0)
		{
			$this->_id = $id;
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
	
	public function setemail($Email)
	{
		$this->_email = $email;
	}

	public function setPassword($password)
	{
		$this->_password = $password;
	}

}
?>