<?php
session_start(); 
//require_once('session.php');
require_once 'C:\xampp\htdocs\cov\racine.php';
require_once "service/UsrService.php";
$usr = new UserService();
$usr->logout();
session_destroy(); 
//echo'session destroyed';
/*unset($_SESSION['user_session']);
unset($_SESSION['id']);
unset($_SESSION['nom']);
unset($_SESSION['prenom']);*/
header("location:home.php");