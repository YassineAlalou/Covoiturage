<?php

include_once '../racine.php';
include_once RACINE.'/service/UsrService.php';
extract($_GET);

$es = new UserService();
$es->delete($es->findById($id));
header("location:../userhistorique.php");