<?php
include_once '../racine.php';
include_once RACINE.'/service/TrajetService.php';

extract($_POST);

if(isset($_POST['contactFrmSubmit']) && !empty($_POST['route']) && !empty($_POST['nbrPlace']) && (!filter_var($_POST['nbrPlace'], FILTER_VALIDATE_nbrPlace) === false) && !empty($_POST['heureDepart']&& !empty($_POST['commentaire'])&& !empty($_POST['dateTrajet']))){
 // Submitted form data
$route   = $_POST['route'];
$nbrPlace  = $_POST['nbrPlace'];
$heureDepart= $_POST['heureDepart'];
$commentaire = $_POST['commentaire'];
$dateTrajet = $_POST['dateTrajet'];
}

$es = new TrajetService();
$es->setcodeTrajet($codeTrajet);
$es->setidUser($_SESSION['id']);
$es->setroute($route);
$es->setnbrPlaces($nbrPlace);
$es->setheurDepart($heureDepart);
$es->setlieuDepart($commentaire);
$es->setcommentaire($commentaire);
$es->setdateTrajet($dateTrajet);

$element = new TrajetService();
$element->update($es);


header("location:../confTrajet.php");


                                                                        
                                                                        