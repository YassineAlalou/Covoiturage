<?php

class VilleTrajet{
	private $codeTrajet;
	private $idVille;
	//private $prix;
	private $etat;

	function __construct($c="",$id="",$e=""){
		$this->codeTrajet = $c;
		$this->idVille = $id;
		//$this->prix = $prix;
		$this->etat = $e;
	
	}

	function getcodeTrajet(){
		return $this->codeTrajet;
	}
	function getidVille(){
		return $this->idVille;
	}/*
	function getprix(){
		return $this->prix;
	}*/
	function getetat(){
		return $this->etat;
	}
	

	function setidVille($idVille){
		$this->idVille = $idVille;
	}
	function setcodeTrajet($codeTrajet){
		$this->codeTrajet = $codeTrajet;
	}/*
	function setprix($prix){
		$this->prix = $prix;
	}*/
	function setetat($etat){
		$this->prix = $etat;
	}
	

}