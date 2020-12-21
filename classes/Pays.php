<?php

class Pays{
	private $idPays;
	private $nomPays;
	

	function __construct($idPays="", $nomPays=""){
		$this->idPays = $idPays;
	    $this->nomPays = $nomPays;
	}

	function getidPays(){
		return $this->idPays;
	}
	function getnomPays(){
		return $this->nomPays;
	}
	

	function setidPays($idPays){
		$this->idPays = $idPays;
	}
	function setnomPays($nomPays){
		 $this->nomPays = $nomPays;
	}
	

}