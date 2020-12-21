<?php

include_once '../racine.php';
include_once RACINE.'/service/PaysService.php';
//include_once RACINE.'/ajoutPays.php';
extract($_POST);

$py = new PaysService();
$py->create(new Pays(1,$nomPays));

header("location:../ajouterpays.php");