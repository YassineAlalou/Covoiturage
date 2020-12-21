<?php
include_once './racine.php';
require_once "classes/user.php";
require_once 'conx/connexion.php';
require_once 'service/UsrService.php';
session_start();
extract($_POST);

//var_dump($_POST);

$data = new UserService();



$ds = $data->findById($_SESSION['id']);
//var_dump($ds);


if($ds->getCle() == $_POST['cle']){
    $con = new Connexion();
    $query ="UPDATE `base`.`user` SET `actif`='1' WHERE  `idUser`=".$_SESSION['id'];
    $req = $con->getConnexion()->prepare($query);
    $req->execute() or die('Erreur SQL compte activation !');
}
header("location:./profile.php");