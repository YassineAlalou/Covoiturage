<?php

include_once './racine.php';
require_once RACINE.'/classes/Pays.php';
require_once RACINE.'/conx/connexion.php';
require_once RACINE.'/dao/Idao.php';



class PaysService implements IDao{

	private $con;

	function __construct(){
		$this->con = new Connexion();
	}
    public function createOffre($o){
        echo '';
    }
    public function createDemande($o){
        echo '';
    }
	public function create($o){
		$query = "INSERT INTO Pays (`idPays`, `nomPays`)"
                . "VALUES (NULL,'" . $o->getnomPays() . "');";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
	}
	public function findAll(){
		$etds = array();
        $query = "select * from Pays";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Pays($e->idPays, $e->nomPays);
        }
        return $etds;
	}

	public function findById($id) {
        $query = "select * from Pays where idPays = " . $id;
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Pays($e->idPays, $e->nomPays);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `Pays` SET `nomPays` = '" . $o->getnomPays() . "' WHERE `Pays`.`idPays` = " . $o->getidPays();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

     public function getAll() {
        $query = "select * from Pays";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($o) {
        $query = "delete from Pays where idPays = " . $o->getidPays();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
}