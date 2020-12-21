<?php

class Trajet{
	private $codeTrajet;
	private $idUser;
	//private $type;
	private $route;
	private $nbrPlaces;
  private $heurDepart;
  private $commentaire;
	private $dateTrajet;
	

	function __construct($codeTrajet="", $idUser="", $route="", $nbrPlaces="", $heurDepart="", $commentaire="", $dateTrajet=""){
			$this->codeTrajet = $codeTrajet;
			$this->idUser = $idUser;
			//$this->type = $type;
			$this->route = $route;
			$this->nbrPlaces = $nbrPlaces;
			$this->heurDepart = $heurDepart;
			$this->commentaire = $commentaire;
			$this->dateTrajet = $dateTrajet;
				
	}

	function getcodeTrajet(){
		return $this->codeTrajet;
	}
	function getidUser(){
		return $this->idUser;
	}
	/*
	function gettype(){
		return $this->type;
	}
	*/
	function getroute(){
		return $this->route;
	}
	function getnbrplaces(){
		return $this->nbrPlaces;
	}
	function getheurDepart(){
		return $this->heurDepart;
    }
    
	function getcommentaire(){
		return $this->commentaire;
    }
  function getdatetrajet(){
		return $this->dateTrajet;
	}

	



	function setcodeTrajet($codeTrajet){
		$this->codeTrajet = $codeTrajet;
	}
	function setidUser($idUser){
		 $this->idUser = $idUser;
	}/*
	function settype($type){
		$this->type = $type;
	}*/
	function setroute($route){
		$this->route = $route;
	}
	function setnbrplaces($nbrPlaces){
		 $this->nbrPlaces = $nbrPlaces;
	}
	function setheurDepart($heurDepart){
		$this->heurDepart = $heurDepart;
    }
  function setcommentaire($commentaire){
		$this->commentaire = $commentaire;
    }
  function setdatetrajet($dateTrajet){
		$this->dateTrajet = $dateTrajet;
	}
	
}