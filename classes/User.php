<?php

class User{
	private $id;
	private $nom;
	private $prenom;
	private $login;
	private $password;
	private $email;
	private $cle;
	private $tel;
	private $img;
	public $actif;

	function __construct($id="", $nom="", $prenom="", $login="", $password="", $email="",$cle="",$tel="",$img="",$actif=""){
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->login = $login;
		$this->password = $password;
		$this->email = $email;
		$this->cle = $cle;
		$this->tel = $tel;
		$this->img = $img;
		$this->actif = $actif;
	}

	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getLogin(){
		return $this->login;
	}
	function getPassword(){
		return $this->password;
	}
	function getemail(){
		return $this->email;
	}
	function getCle(){
		return $this->cle;
	}
	function getTel(){
		return $this->tel;
	}
	function getImg(){
		return $this->img;
	}
	function getActif(){
		return $this->actif;
	}


	function setId($id){
		$this->id = $id;
	}
	function setNom($nom){
		$this->nom = $nom;
	}
	function setPrenom($prenom){
		$this->prenom = $prenom;
	}
	function setLogin($login){
		$this->login = $login;
	}
	function setPassword($password){
		$this->password = $password;
	}
	function setemail($email){
		$this->email = $email;
	}
	function setCle($cle){
		$this->cle = $cle;
	}
	function setTel($tel){
		$this->tel = $tel;
	}
	function setImg($img){
		$this->img = $img;
	}
	function setActif($actif){
		$this->actif = $actif;
	}

	public function __toString(){
		return $this->nom. " ".$this->prenom;
	}
}