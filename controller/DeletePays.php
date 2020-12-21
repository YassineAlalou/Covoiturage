<?php

include_once '../racine.php';
include_once RACINE.'/service/PaysService.php';
extract($_GET);

$es = new PaysService();
$es->delete($es->findById($id));
header("location:../index.php");