<?php
session_start();
include_once '../racine.php';
include_once RACINE.'/service/VilleTrajetService.php';
extract($_POST);

$vil = new VilleTrajetService();
//$vil->create(new VilleTrajet($id,$idVille));


header("location:../cree.php");