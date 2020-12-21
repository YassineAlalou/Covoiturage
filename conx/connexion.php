<?php

class Connexion{
	private $con;

	public function __construct(){
		$host = "localhost";
		$dbname = "base";
		$login = "root";
		$password = "";
		try{
			$this->con = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
		}catch(Exception $e){
			die('Error :'. $e->getMessage());
		}
	}
	function getConnexion(){
		return $this->con;
	}

}