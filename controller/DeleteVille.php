<?php

include_once '../racine.php';
include_once RACINE.'/service/VilleService.php';
extract($_GET);

$es = new VilleService();
$es->delete($es->findById($id));
header("location:../index.php");