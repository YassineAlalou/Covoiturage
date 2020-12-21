<?php

include_once '../racine.php';
include_once RACINE.'/service/UsrService.php';
$key = "";

// focntion generation de 4 caracteres random  :
function generateRandomString($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if(isset($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST['email'],$_POST['password'])){
    if(!empty(trim($_POST['login']))){
     if(!empty(trim($_POST['password']))){
      
	    if($_POST['password']==$_POST['password2']){
	       extract($_POST);
	       //$password_md5=md5(trim($password));
		$key = generateRandomString();
		//$key =$password_md5;
	    $usr = new UserService();
		$usr->create(new User(1,$nom,$prenom,$login,$password,$email,$key));
		   header("location:../msgValidation.php");
      }else echo'Les deux mots de passe ne doivent pas êtres différents. <br>' ;
     } else echo'Les mots de passe ne peuvent pas être vide. <br>';
    } else echo'Le pseudo ne peut pas être vide. <br>';
   }

$destinataire = $email;
$sujet = "Activer votre compte" ;
$entete = "From: inscription@dinim3ak.com" ;
 
// Le lien d'activation est composé du login(log) et de la clé(cle)
$message = "Bienvenue sur VotreSite,
Pour activer votre compte, veuillez copiez les 4 digits ci dessous.
Votre cle = ".$key."
http://localhost/newtemp/activation.php?log=".urlencode($login);


mail($destinataire, $sujet, $message, $entete);
