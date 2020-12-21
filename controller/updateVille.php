<?php
include_once '../racine.php';
include_once RACINE.'/service/VilleService.php';


$es = new Ville();
echo $_GET['idVille'];
$es->setidVille($_GET['idVille']);
$es->setnomVille($_POST['nomVille']);
$es->setidPays($_POST['idPays']);


$element = new VilleService();
$element->update($es);




header("location:../index.php");