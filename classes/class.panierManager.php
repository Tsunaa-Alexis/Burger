<?php
class PanierManager {
	
	private $_db;

	public function __construct($db){
		$this->setDB($db);
	}

    public function verifIfPanierExist($idUser){

        if(empty($idUser)){ $idUser = 0; }
        $q = $this->_db->prepare('SELECT COUNT(*) FROM panier WHERE idUser = :idUser');
		$q->execute([':idUser'=> $idUser]);
		return (bool) $q->fetchColumn();

    }

    public function createPanier($idUser){

        if(empty($idUser)){ return false; }
        
        $retour = array();

        $q = $this->_db->prepare('INSERT INTO panier(idUser) VALUES(:idUser)');
		$q->bindValue(':idUser', $idUser);

		$retour['request'] = $q->execute();
        $retour['id'] = $this->_db->lastInsertId();
		
        return $retour;

    }

    public function recupPanierFromUser($idUser){

        if(empty($idUser)){ $idUser = 0; }

        $retour = 0;

        $q = $this->_db->prepare('SELECT idPanier FROM panier WHERE idUser = :idUser');
		$q->execute([':idUser'=> $idUser]);

        $panier = $q->fetch(PDO::FETCH_ASSOC);
        $retour = $panier['idPanier'];

        return $retour;
    }

    // initialisation de la db
	public function setDb(PDO $db){
		$this->_db = $db;
	}

}

?>