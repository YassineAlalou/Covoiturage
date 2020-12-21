<?php
session_start();
include_once '../racine.php';
include_once RACINE.'/service/UsrService.php';
//var_dump($_POST);

$es = new User();
//echo $_GET['id'];
$pass1 = $_POST['password'];
$pass2 = $_POST['password2'];
if($pass1 == $pass2){
$es->setId($_SESSION['id']);
$es->setNom($_POST['nom']);
$es->setPrenom($_POST['prenom']);
$es->setLogin($_POST['login']);
$es->setPassword($_POST['password']);
//$es->setCin($_POST['cin']);
$es->setTel($_POST['tel']);
$es->setImg($_POST['pic']);



$element = new UserService();
$element->update($es);

}
else{
    echo 'password missmatched';
}


header("location:../profile.php");