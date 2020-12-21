<?php
include_once '../racine.php';
include_once RACINE.'/service/PaysService.php';


$es = new Pays();
echo $_GET['idPays'];
$es->setidPays($_GET['idPays']);
$es->setnomPays($_POST['nomPays']);


$element = new PaysService();
$element->update($es);




header("location:../index.php");