<?php

include_once '../racine.php';
include_once RACINE.'/service/VilleTrajetService.php';
extract($_GET);

$es = new VilleTrajetService();
$es->delete($es->findById($codeTrajet,$idVille));
header("location:../index.php");