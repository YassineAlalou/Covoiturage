<?php

include_once '../racine.php';
include_once RACINE.'/service/VilleService.php';
extract($_POST);
//print_r($_POST);

$vil = new VilleService();
$vil->create(new Ville(1,$nomVille,$idPays,$lat,$long));

header("location:../ajouterville.php");