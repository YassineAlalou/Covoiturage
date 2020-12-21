<?php

include_once './racine.php';
include_once RACINE.'/classes/Trajet.php';
include_once RACINE.'/conx/connexion.php';
include_once RACINE.'/dao/Idao.php';

class TrajetService implements IDao{

	private $con;

	function __construct(){
		$this->con = new Connexion();
	}
    public function create($o){
        
            $query = "INSERT INTO Trajet (`codeTrajet`, `idUser`, `route`, `nbrPlaces`, `heurDepart`, `commentaire`, `dateTrajet`) "
                    . "VALUES (NULL,'" . $o->getidUser() . "','" . $o->getroute() . "', '" . $o->getnbrPlaces() . "', '" . $o->getheurDepart() . "','" . $o->getcommentaire() . "','" . $o->getdateTrajet() .  "');";
            $req = $this->con->getConnexion()->prepare($query);
            $req->execute() or die('Erreur SQL trajet');
            $lastid = $this->con->getConnexion()->lastInsertId();
            return $lastid;
    }
	public function findAll(){
		$etds = array();
        $query = "select distinct * from Trajet";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Trajet($e->codeTrajet, $e->idUser, $e->route, $e->nbrPlaces, $e->heurDepart, $e->commentaire, $e->dateTrajet);
        }
        return (object)$etds;
	}
    
    public function findById($id){
        $etds = array();
        $query = "select * from `Trajet` where `idUser` = " . $id;
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Trajet($e->codeTrajet, $e->idUser, $e->route, $e->nbrPlaces, $e->heurDepart, $e->commentaire, $e->dateTrajet);
        }
        return $etds;
        /*
        $query = "SELECT `codeTrajet` from `Trajet` where `idUser` = ".$id;        
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
        */
    }
   
    public function update($o) {
        $query = "UPDATE `Trajet` SET `route` = '" . $o->getroute() . "', `nbrPlaces` = '" . $o->getnbrplaces . "', `heurDepart` = '" . $o->getheurDepart() . "', `commentaire` = '" . $o->getcommentaire() . "', `dateTrajet` = '" . $o->getdateTrajet() . "' WHERE `Trajet`.`codeTrajet` = " . $o->getcodeTrajet();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL Update');
    }

     public function getAll() {
        $query = "select * from Trajet";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete($o) {
        $query = "DELETE from `Trajet` where `codeTrajet` =". $o;
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL Delete');
    }


    public function findTrajetByDate($date){
        //$arr = array();
        try{
            $query = " select vt.codeTrajet,v.nomVille,vt.idVille,vt.etat from trajet t,ville v,villetrajet vt where dateTrajet like '".$date."' and t.codeTrajet = vt.codeTrajet and v.idVille=vt.idVille order by vt.codeTrajet,etat ";
            $req = $this->con->getConnexion()->prepare($query);
            $req->execute();
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        catch(Exception $e){
            die('Error :'. $e->getMessage());
        }

    }
    public function distinct($date){
        $query = "select distinct(vt.codeTrajet) from villetrajet vt
        natural join trajet t
        natural join ville v
        where
        t.dateTrajet like '".$date."' ";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function findBycode($cd){
        
        $etds = array();
        $query = "select * from trajet where codeTrajet like '".$cd."' ";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Trajet($e->codeTrajet, $e->idUser, $e->route, $e->nbrPlaces, $e->heurDepart, $e->commentaire, $e->dateTrajet);
        }
        return $etds;
    }
}