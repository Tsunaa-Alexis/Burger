<?php
class CategorieManager {
	
	private $_db;

	public function __construct($db){
		$this->setDB($db);
	}

    // initialisation de la db
	public function setDb(PDO $db){
		$this->_db = $db;
	}

    public function getOneCategorie($id){
        $q  = $this->_db->prepare("SELECT * FROM categorie WHERE idCategorie= :id");
		$q->bindValue(':id', $id);
        $q->execute();
        $categorie = $q->fetch(PDO::FETCH_ASSOC);
        if($categorie){
            $categorie = new Categorie($categorie);
        }
        return $categorie;
    }

    public function getAllCategorie(){
     
        $q = $this->_db->prepare('SELECT * FROM categorie');
		$q->execute();
        
        $categories = $q->fetchAll(PDO::FETCH_ASSOC);
       $retour = array();
        foreach($categories as $categorie){
            $retour[] = new Categorie($categorie);     
        }
        return $retour;
    }
}

?>