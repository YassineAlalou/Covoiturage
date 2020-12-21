<?php
include_once '../racine.php';
include_once RACINE.'/service/VilleTrajetService.php';


$es = new VilleTrajet();
echo $_GET['codeTrajet'];
echo $_GET['idVille'];
$es->setcodeTrajet($_GET['codeTrajet']);
$es->setidVille($_POST['idVille']);
$es->setprix($_POST['prix']);


$element = new VilleTrajetService();
$element->update($es);




header("location:../index.php");