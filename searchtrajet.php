<?php
session_start();
//print_r($_SESSION);
include_once './racine.php';
require_once "classes/user.php";
require_once 'conx/connexion.php';
require_once 'service/UsrService.php';
if(!isset($_SESSION['id']))
{
header('location:login.php');
}
$profCheck = new UserService();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> 
  <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Covoiturage
    </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" >
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="assests/css/search.css">
    <script src="assests/js/search.js"></script>

  </head>
  <body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars">
            </i>
          </button>
          <a class="navbar-brand" href="./">
            <img src="images/logo.png" alt="Logo">
          </a>
          <a class="navbar-brand hidden" href="./">
            <img src="images/logo2.png" alt="Logo">
          </a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="home.php"> 
                <i class="menu-icon fa  fa-home">
                </i>Acceuil 
              </a>
            </li>
            <h3 class="menu-title">Options :
            </h3>
            <!-- /.menu-title -->
            <li>
              <a href="cree.php"> 
                <i class="menu-icon ti-car">
                </i>Ajouter Trajet 
              </a>
            </li>
            <li>
              <a href="historique.php"> 
                <i class="menu-icon ti-save">
                </i>Historique 
              </a>
            </li>
            <li>
              <a href="profile.php"> 
                <i class="menu-icon ti-user">
                </i>Profile 
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel hideen bel and msg feature-->
    <div  id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
        <div class="header-menu">
        <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <!-- Hidden bel and msg feature-->
        </div>
          <div class="col-sm-12">
            <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src=
                     <?php $img = $profCheck->findById($_SESSION['id']); 
                echo 'images/'.$img->getImg(); ?>   alt="User Avatar">
              </a>
              <div class="user-menu dropdown-menu">
                <a class="nav-link" href="profile.php">
                  <i class="fa fa- user">
                  </i>My Profile
                </a>
                <a class="nav-link" href="#">
                  <i class="fa fa -cog">
                  </i>Settings
                </a>
                <a class="nav-link" href="logout.php">
                  <i class="fa fa-power -off">
                  </i>Logout
                </a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- /header -->
      <!-- Header-->
      <div hidden class="breadcrumbs">
        <div class="col-sm-4">
          <div class="page-header float-left">
            <div class="page-title">
              <h1>Dashboard
              </h1>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="page-header float-right">
            <div class="page-title">
              <ol class="breadcrumb text-right">
                <li class="active">Dashboard
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content mt-3">
      <!-- begin -->
      <div class="container">
      <!-- start loop here -->
      <div class="card">
          <div class="card-header">
            <strong class="card-title">Trajet rechercher :
            </strong>
          </div>
          <div class="content mt-3">
            
            <!--Start-->            
                            <?php
                             require_once RACINE.'/service/TrajetService.php';
                             require_once RACINE.'/classes/Trajet.php';
                             extract($_POST);
                             $ob = new TrajetService();
                             $abc= array();
                             $abc = $ob->findTrajetByDate($_POST['dateTrajet']);
                             //echo $_POST['dateTrajet'];
                             //var_dump($abc);
                             //var_dump($_POST);
                             //print_r($abc);
                             $arCode = array();// store CodeTrajet in this Array :: use codes to iretate over all stored data from the query
                             $i = 0;  
                             $var = $abc[0]['codeTrajet'];
                             for($i =0; $i< sizeof($abc);$i++){
                                if($var == $abc[$i]['codeTrajet'] and $abc[$i]['etat']==0){
                                  array_push($arCode,$abc[$i]['nomVille']);
                                }
                                if($var != $abc[$i]['codeTrajet'] and $abc[$i]['etat']==0 ){
                                  array_push($arCode,$abc[$i-1]['nomVille']);
                                  array_push($arCode,$abc[$i]['nomVille']);
                                  $var= $abc[$i]['codeTrajet'];
                                }
                             }
                             array_push($arCode,$abc[$i-1]['nomVille']);
                             // loop through list of city to determine trajet by nomDep nomArr
                             $tr = new TrajetService();
                             $codeTr = array();
                             $codeTr = $tr->distinct($_POST['dateTrajet']); // codeTrajet par rapport a une date donnee
                             $num =array();
                             for($k=0;$k < sizeof($arCode); $k=$k+2){
                               if($arCode[$k] == $_POST['depart'] and $arCode[$k+1] == $_POST['destination']){
                                  array_push($num,$k);
                               }
                             }
                             $gr = array();
                             if($num[0] == 0){
                                $gr[0] = $codeTr[0];
                                for($h=1; $h<sizeof($num); $h++){
                                  $gr[$h]= $codeTr[$num[$h]-2];
                                  
                               }
                             }
                             
                             
                             else{
                              for($h=0; $h<sizeof($num); $h++){
                                if( $num[$h] > sizeof($codeTr)){
                                  $gr[$h]= $codeTr[sizeof($codeTr)-sizeof($num)];
                               }
                               else $gr[$h]= $codeTr[$num[$h]-1];
                             }
                             }
                             //var_dump($arCode);
                            /* echo '</br>';
                             var_dump($codeTr);
                             echo '</br>';
                             var_dump($num);
                             echo '</br>';
                            var_dump($gr);*/

/*
                             var_dump($gr);
                             var_dump($num);
                             var_dump($codeTr);
                            //echo $abc[2-1]['nomVille'];
                             var_dump($arCode);
*/
                            ?>
      
            <div class="row form-group">
              <div class=" col-md-9 col-lg-9 "> 
                <table class="table table-user-information">
                <?php /*
                foreach($gr as $a){
                  $n = new TrajetService();
                  //$nar = new Trajet();
                  $nar = array();
                  $nar = $n->findBycode($a['codeTrajet']);
                  foreach($nar as $na){
                  if($na['codeTrajet'] == $a){

                
                */
                ?>
                   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
                                          <thead>
                                              <tr>
                                                  <th>Code Trajet</th>
                                                  <!--<th>Type</th>-->
                                                  <th>Type de Route</th>
                                                  <th>Date Trajet</th>
                                                  <th>heure Depart</th>
                                                  <th>Nombre Places</th>
                                                  <th>Utilisateur</th>
                                                  <th>Visualiser</th>
                                                  
                                                  
                                              </tr>
                                          </thead>
                                          <?php 
                                          $grr = array();
                                          foreach($gr as $g){
                                            array_push($grr,$g['codeTrajet']);
                                          }
                                          
                                         // var_dump($grr);
                                           $n = new TrajetService();
                                            for($s = 0; $s<sizeof($grr); $s++){
                                              
                                              //$na = new Trajet();  
                                              
                                             // foreach($n->findBycode($grr[$s]) as $na){
                                              $na = $n->findBycode($grr[$s]);
                                             // var_dump($na);
                                            foreach($na as $nar){
                                            
                                            ?>
                                                <tr>
                                                    <td><?php echo $nar->getcodeTrajet(); ?></td>                                                  
                                                    
                                                    <td><?php if($nar->getroute()==1) echo "Regional";
                                                    if($nar->getroute()==2) echo"Auto Route";
                                                    if($nar->getroute()==3) echo"Nationale";?></td>
                                                    <td><?php echo $nar->getdateTrajet(); ?></td>
                                                    <td><?php echo $nar->getheurDepart(); ?></td>
                                                    <td><?php echo $nar->getnbrplaces(); ?></td>
                                                    <td><a  href="/newtemp/PageProfile.php?id=<?php echo $nar->getidUser();  ?>" ><?php echo $nar->getidUser(); ?></a> </td>
                                                    <td>
                                                    <a class="ti-location-pin" href="/newtemp/mapAPI.php?id=<?php echo $nar->getcodeTrajet();?>" >
                                                    </td>
                                              
                                                </tr>
                                            <?php }} ?>
                                        </table>
                  <?php 
                  //}
                    
                  
                  ?>
                </table>
              </div>
              
            </div>
            
            <!-- </form>-->
            <!-- MODAL -->
            
             
      


                
        

      <!-- end -->
      </div> 
      <!-- .content -->
    </div>
    <!-- /#right-panel -->
    <!-- Right Panel -->
    <script src="assets/js/vendor/jquery-2.1.4.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js">
    </script>
    <script src="assets/js/plugins.js">
    </script>
    <script src="assets/js/main.js">
    </script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js">
    </script>
    
  </body>
</html>
