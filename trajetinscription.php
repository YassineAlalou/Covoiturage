<?php
session_start();

include_once './racine.php';
require_once "classes/user.php";
require_once 'conx/connexion.php';
require_once 'service/TrajetService.php';
$dt = new TrajetService();
$f = $dt->findAll();
extract($_POST);
extract($_GET);
echo $_SESSION['id'];
var_dump($_GET);




//header("location:./home.php");

