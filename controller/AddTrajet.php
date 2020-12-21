<script src="assets/js/alert.js"></script>
<?php
session_start();
include_once '../racine.php';
include_once RACINE.'/service/TrajetService.php';
include_once RACINE.'/service/VilleTrajetService.php';
include_once RACINE.'/conx/connexion.php';

extract($_POST);
//if(isset($_POST['idPays'])and isset($_POST['idVille'])and isset($_POST['route'])and isset($_POST['nbrPlaces'])and isset($_POST['heureDepart']))
$eta = array();
for($k=0; $k< sizeof($_POST['formville']);$k++){
  $eta[$k] = $k;
}
if(!empty($_POST['idPays']) and !empty($_POST['idVille'])and !empty($_POST['route']) and !empty($_POST['nbrPlaces']) and !empty($_POST['heurDepart']))
{
$id= $_SESSION['id'];
$Trj = new TrajetService();
$lastid = $Trj->create(new Trajet(1,$id,$route,$nbrPlaces,$heurDepart,$commentaire,$dateTrajet));

  $vil = new VilleTrajetService();
  $aDoor = array();
  $aDoor = $_POST['formville'];

  if(empty($aDoor)) 
  {
    echo("Vous N'avez Selecter Aucune Ville.");
  } 
  else
  {
    $N = count($aDoor);
    for($i=0; $i < $N; $i++)
    {
      $vil->create(new VilleTrajet($lastid,$aDoor[$i],$eta[$i]));
    }
  }
header("location:../cree.php");
}
else{
  echo "makhdamch hadchi";
}


