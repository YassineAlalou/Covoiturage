<?php
session_start();
include_once '../racine.php';
include_once RACINE.'/service/TrajetService.php';
//include_once 'C:\xampp\htdocs\cov\classes\Trajet.php';
extract($_GET);

$id = $_GET['id'];
//echo $id;
$es = new TrajetService();
// print_r($es->findById(214));
$es->delete($id);
if($_SESSION['id']==78)
    header("location:../trajethistorique.php");
else
    header("location:../historique.php");