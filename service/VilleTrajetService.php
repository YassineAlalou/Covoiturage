<?php
//include_once RACINE . '/classes/VilleTrajet.php';
include_once './racine.php';
include_once RACINE.'/classes/VilleTrajet.php';
include_once RACINE.'/conx/connexion.php';
include_once RACINE.'/dao/Idao.php';

class VilleTrajetService implements Idao{

	private $con;

	function __construct(){
		$this->con = new Connexion();
	}

	public function create($o){
        
        $query = "INSERT INTO `villetrajet` (`codeTrajet`, `idVille`, `etat`)"
        ." VALUES (".(int)$o->getcodeTrajet() . "," . (int)$o->getidVille() . ", " .(int) $o->getetat().")";
        $req = $this->con->getConnexion()->prepare($query);
        print_r($req);
        $req->execute() or die('Erreur SQL ville trajet');
        $this->connection = null;

    }
	public function findAll(){
		$etds = array();
        $query = "select * from VilleTrajet";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new VilleTrajet($e->codeTrajet, $e->idVille,$e->etat);
        }
        return $etds;
	}

	public function findById($codeTrajet) {
        $query = "select * from `VilleTrajet` where `codeTrajet` = " .$codeTrajet;
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new VilleTrajet($e->codeTrajet,$e->idVille,$e->etat);
        }
        return $etd;
    }

       public function update($o) {
        $query = "UPDATE `VilleTrajet` SET `codeTrajet` = '" . $o->getcodeTrajet() . "', `idVille` = '" . $o->getidVille() . "',`prix` = '" . $o->getprix() . "' WHERE `VilleTrajet`.`codeTrajet` = " . $o->getcodeTrajet(). "AND `VilleTrajet`.`idVille` = ". $o->getidVille();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

     public function getAll() {
        $query = "select * from VilleTrajet";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($o) {
        $query = "delete from VilleTrajet where idVille = " . $o->getidVille() ."AND codeTrajet = " . $o->getcodeTrajet();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
}