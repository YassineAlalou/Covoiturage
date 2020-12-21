<?php
include_once './racine.php';
require_once "classes/user.php";
require_once 'conx/connexion.php';
require_once 'service/UsrService.php';

extract($_POST);
$data = new UserService();
$ds = $data->findAll();
foreach($ds as $e){
    if($e->getemail() == $_POST['forgot']){
        $destinataire = $_POST['forgot'];
        $sujet = "Mot de Pass Oublier" ;
        $entete = "From: inscription@dinim3ak.com" ;
        
        $message = "Bienvenue sur Dinim3ak,
        Votre Mot de pass est :.
        Votre mdp = ".$e->getPassword()."
        http://localhost/newtemp/login.php";


        mail($destinataire, $sujet, $message, $entete);
    }
}
header("location:./oublier.php");