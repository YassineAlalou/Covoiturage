<?php
include_once '../racine.php';
include_once RACINE.'/service/TrajetService.php';


$es = new Trajet();
echo $_GET['codeTrajet'];
$es->setcodeTrajet($_GET['codeTrajet']);
//$es->settype($_POST['type']);
$es->setroute($_POST['route']);
$es->setnbrPlaces($_POST['nbrPlaces']);
$es->setheurDepart($_POST['heurDepart']);
$es->setlieuDepart($_POST['lieuDepart']);
$es->setcommentaire($_POST['commentaire']);
$es->setdateTrajet($_POST['dateTrajet']);


$element = new TrajetService();
$element->update($es);

header("location:../historique.php");