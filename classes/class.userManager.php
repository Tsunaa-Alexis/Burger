<?php
class UserManager{
	
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	// ajouter un user
	public function add(User $user)
	{
        
		$q = $this->_db->prepare('INSERT INTO user(nom,prenom,email,password) VALUES(:nom, :prenom,:email, :password)');
		$q->bindValue(':nom', $user->getNom());
		$q->bindValue(':prenom', $user->getPrenom());
		$q->bindValue(':email', $user->getEmail());
		$q->bindValue(':password', $user->getPassword());

		$q->execute();

		$user->hydrate([
			'idUser' => $this->_db->lastInsertId(),
        ]);

	}

	// récupérer les informations en fonction de l'email
	public function getUser($sonMail)
	{
		$q= $this->_db->query('SELECT  nom, prenom, email, password, idUser FROM user WHERE email = "'. $sonMail .'"');
		$userInfo = $q->fetch(PDO::FETCH_ASSOC);

		if($userInfo){
			return new User($userInfo);
		}	

		return $userInfo;

	}

	// récupérer les informations d'un utilisateurs à partir de sont id
	public function getUserbyid($id)
	{
		$q= $this->_db->prepare('SELECT  nom, prenom, mail, mdp, type, numTel, id FROM user WHERE id = :id');
		$q->bindValue(':id', $id);
		$q->execute();
		$userInfo = $q->fetch(PDO::FETCH_ASSOC);

		if ($userInfo){
			return new User($userInfo);
		}	

		return $userInfo;

	}

	// modifier les information d'un user
	public function edit(User $user)
	{
		$q = $this->_db->prepare("UPDATE user SET nom = :nom, prenom = :prenom, mail = :mail, numTel = :numTel WHERE id = :id");


		$q->bindValue(':nom', $user->getNom());
		$q->bindValue(':prenom', $user->getPrenom());
		$q->bindValue(':mail', $user->getMail());
		$q->bindValue(':numTel', $user->getNumTel());
		$q->bindValue(':id', $user->getId());

		$q->execute();
	}

	// compter le nombre d'utilisateurs
	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM user")->fetchColumn();
	}

	// vérifier qu'un email est déjà utilisé
	public function emailExists($emailUser){

		$q = $this->_db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
		$q->execute([':email'=> $emailUser]);
		return (bool) $q->fetchColumn();

	}

	public function verifLoginInfos($email, $password){

		if(empty($email)){ return false; }
		if(empty($password)){ return false; }

		$utilisateur = $this->getUser($email);

		if(!empty($utilisateur)){

			if(password_verify($password, $utilisateur->getPassword())){
				return true;
			}

		}

		return false;


	}

	// initialisation de la db
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}

}
?>