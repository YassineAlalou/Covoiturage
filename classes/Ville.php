<?php

class Ville{
	private $idVille;
	private $nomVille;
	private $idPays;
	private $Lat;
	private $Lng;
	

	function __construct($idVille="", $nomVille="", $idPays="",$Lat="",$Lng=""){
		$this->idVille = $idVille;
		$this->nomVille = $nomVille;
		$this->idPays = $idPays;
		$this->Lat = $Lat;
		$this->Lng = $Lng;
	}

	function getidVille(){
		return $this->idVille;
	}
	function getnomVille(){
		return $this->nomVille;
	}
	function getidPays(){
		return $this->idPays;
	}
	function getLat(){
		return $this->Lat;
	}
	function getLng(){
		return $this->Lng;
	}

	function setidVille($idVille){
		$this->idVille = $idVille;
	}
	function setnomVille($nomVille){
		 $this->nomVille = $nomVille;
	}
	function setidPays($idPays){
		$this->idPays = $idPays;
	}
	function setLat($Lat){
		$this->Lat = $Lat;
	}
	function setLng($Lng){
		$this->Lng = $Lng;
	}
}