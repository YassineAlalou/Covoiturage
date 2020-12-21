<?php

include_once './racine.php';
require_once RACINE.'/conx/connexion.php';
require_once RACINE.'/dao/Idao.php';
require_once RACINE.'/classes/Ville.php';



class VilleService implements IDao{

	private $con;

	function __construct(){
		$this->con = new Connexion();
	}
    
	public function create($o){
		$query = "INSERT INTO Ville (`idVille`, `nomVille`, `idPays`,`Lat`,`Lng`)"
                . "VALUES (NULL, '" . $o->getnomVille() . "', '" . $o->getidPays() . "','" . $o->getLat() . "','" . $o->getLng() . "');";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
	}
	public function findAll(){
		$etds = array();
        $query = "select * from Ville";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Ville($e->idVille, $e->nomVille, $e->idPays, $e->Lat, $e->Lng);
        }
        return $etds;
	}

	public function findById($id) {
    
        $query = "select * from Ville where idVille = " . $id;
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Ville($e->idVille, $e->nomVille, $e->idPays, $e->Lat, $e->Lng);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `Ville` SET `nomVille` = '" . $o->getnomVille() . "' WHERE `Ville`.`idVille` = " . $o->getidVille();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

     public function getAll() {
        $query = "select * from Ville";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($o) {
        $query = "delete from Ville where idVille = " . $o->getidVille();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
}