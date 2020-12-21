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
//$img = $profCheck->findById($_SESSION['id']); 
//echo 'images/'.$img->getImg().'.jpg';
//var_dump($img);
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--<script type="text/javascript" src="js/datatables.min.js"></script>-->
    <script src="assets/js/ajax.js">
    </script>
    <script src="https://code.jquery.com/jquery.js">
    </script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="assets/js/jquery.tagsinput.js">
    <script src="assets/js/custom.js">
    </script>
    <script src="https://code.jquery.com/jquery.js">
    </script>
    <!-- sweetAlert -->
    <script>
      $(document).ready(function(){
        $('.action').change(function(){
          if($(this).val() != '')
          {
            var action = $(this).attr("id");
            var query = $(this).val();
            var result = '';
            if(action == "idPays")
            {
              result = 'idVille';
            }
            $.ajax({
              url:"fetch.php",
              method:"POST",
              data:{
                action:action, query:query}
              ,
              success:function(data){
                $('#'+result).html(data);
              }
            }
                  )
          }
        }
                           );
      }
                       );
    </script>
    <script>
      var listville = [];
      function deletethisbra(valeur){
        var ele = $("#ville_"+valeur);
        var text = $("#ville_"+valeur+" span:first-child").text();
        ele.slideUp("2000");
        setTimeout(function(){
          ele.remove();
        }
                   , 2000);
        //$('#idVille').append('<option value='+valeur+'>'+text+'</span>');
        listville.splice( $.inArray(valeur, listville), 1 );
      }
      $ (document).ready(function(){
        $("#bn1").on('click', function () {
          var autselected = $('#idVille option:selected');
          var valeur = autselected.val();
          var text = autselected.text();
          //alert(text +' ' +valeur);
          var newbra = [valeur, text];
          //alert(newbra);
          listville.push(newbra);
          $('#listville option[value='+valeur+']').remove();
          $('#vs-block').append(
            '<div class="badge badge-info" id="ville_'+valeur+'">'+
            '<span  class="nameofaut" name="b">'+text+'</span>'+
            '<input name="formville[]" type="checkbox" name="villes" value="'+valeur+'" style="display:none;" checked />'+
            '<span  class="fa fa-times-circle" onclick="deletethisbra('+valeur+');"></i></span>'+
            '</div>');
        }
                    )
      }
                        );
    </script>
  </head>
  <body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="indexAdmin.php"><h4 class="menu-title"><i><b> Covoiturage </i></b> </h4> </a>
            </div>

              <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="indexAdmin.php"> <i class="menu-icon fa fa-dashboard"></i> Home  </a>
                    </li>
                    <h3 class="menu-title">Gérer </h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Utilisateurs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa  fa-search"></i><a href="userhistorique.php">Consulter Utilisateurs</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Villes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-square-o"></i><a href="ajouterville.php">Ajouter Ville</a></li>
                            <li><i class="fa fa-search"></i><a href="villehistorique.php">consulter les Villes</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map-marker"></i>Pays</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus-square-o"></i><a href="ajouterpays.php">Ajouter Pays</a></li>
                            <li><i class="menu-icon fa fa-search"></i><a href="payshistorique.php">Consulter les Pays</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-road"></i>Trajets</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-search"></i><a href="trajethistorique.php">Consulter les Trajets</a></li>
                        </ul>
                    </li>

                    
                         
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel hideen bel and msg feature-->
    <div  id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
        <div class="header-menu">
          <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left">
              <i class="fa fa fa-tasks">
              </i>
            </a>
            <!-- Hidden bel and msg feature-->
            <div hidden class="header-left">
              <button class="search-trigger">
                <i class="fa fa-search">
                </i>
              </button>
              <div class="form-inline">
                <form class="search-form">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                  <button class="search-close" type="submit">
                    <i class="fa fa-close">
                    </i>
                  </button>
                </form>
              </div>
              <div class="dropdown for-notification">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell">
                  </i>
                  <span class="count bg-danger">5
                  </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="notification">
                  <p class="red">You have 3 Notification
                  </p>
                  <a class="dropdown-item media bg-flat-color-1" href="#">
                    <i class="fa fa-check">
                    </i>
                    <p>Server #1 overloaded.
                    </p>
                  </a>
                  <a class="dropdown-item media bg-flat-color-4" href="#">
                    <i class="fa fa-info">
                    </i>
                    <p>Server #2 overloaded.
                    </p>
                  </a>
                  <a class="dropdown-item media bg-flat-color-5" href="#">
                    <i class="fa fa-warning">
                    </i>
                    <p>Server #3 overloaded.
                    </p>
                  </a>
                </div>
              </div>
              <div class="dropdown for-message">
                <button class="btn btn-secondary dropdown-toggle" type="button"
                        id="message"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti-email">
                  </i>
                  <span class="count bg-primary">9
                  </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="message">
                  <p class="red">You have 4 Mails
                  </p>
                  <a class="dropdown-item media bg-flat-color-1" href="#">
                    <span class="photo media-left">
                      <img alt="avatar" src="images/avatar/1.jpg">
                    </span>
                    <span class="message media-body">
                      <span class="name float-left">Jonathan Smith
                      </span>
                      <span class="time float-right">Just now
                      </span>
                      <p>Hello, this is an example msg
                      </p>
                    </span>
                  </a>
                  <a class="dropdown-item media bg-flat-color-4" href="#">
                    <span class="photo media-left">
                      <img alt="avatar" src="images/avatar/2.jpg">
                    </span>
                    <span class="message media-body">
                      <span class="name float-left">Jack Sanders
                      </span>
                      <span class="time float-right">5 minutes ago
                      </span>
                      <p>Lorem ipsum dolor sit amet, consectetur
                      </p>
                    </span>
                  </a>
                  <a class="dropdown-item media bg-flat-color-5" href="#">
                    <span class="photo media-left">
                      <img alt="avatar" src="images/avatar/3.jpg">
                    </span>
                    <span class="message media-body">
                      <span class="name float-left">Cheryl Wheeler
                      </span>
                      <span class="time float-right">10 minutes ago
                      </span>
                      <p>Hello, this is an example msg
                      </p>
                    </span>
                  </a>
                  <a class="dropdown-item media bg-flat-color-3" href="#">
                    <span class="photo media-left">
                      <img alt="avatar" src="images/avatar/4.jpg">
                    </span>
                    <span class="message media-body">
                      <span class="name float-left">Rachel Santos
                      </span>
                      <span class="time float-right">15 minutes ago
                      </span>
                      <p>Lorem ipsum dolor sit amet, consectetur
                      </p>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src=
                     <?php $img = $profCheck->findById($_SESSION['id']); 
                echo 'images/'.$img->getImg(); ?>   alt="User Avatar">
              </a>
              <?php
$isActif = $profCheck->findById($_SESSION['id']);
?>
              <div class="user-menu dropdown-menu">
                <a class="nav-link" href="profile.php">
                  <i class="fa fa- user">
                  </i>My Profile
                </a>
                <!--
                <a class="nav-link" href="#">
                  <i class="fa fa -cog">
                  </i>Settings
                </a>
                -->
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
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Profile :
            </strong>
          </div>
          <div class="content mt-3">
            <div class="col-md-3 col-lg-3 " align="center"> 
              <img alt="User Pic" src=
                   <?php $img = $profCheck->findById($_GET['id']); 
              echo 'images/'.$img->getImg(); ?> class="img-circle img-responsive"> 
            </div>
            <!--Start-->            
                            <?php
                            extract($_GET);
                            //var_dump($_GET['id']);
                            if(!$_GET['id']){
                              $id = $_SESSION['id'];
                            }
                            else $id=$_GET['id'];
                            $usr = new UserService();
                            $usrData = $usr->findById($id);
                            //var_dump($usrData);
                            ?>
            <div class="row form-group">
              <div class=" col-md-9 col-lg-9 "> 
                <table class="table table-user-information">
                  <tbody>
                    <tr>
                      <td>Nom:
                      </td>
                      <td>
                        <?php echo $usrData->getNom(); ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Prenom:
                      </td>
                      <td>
                        <?php echo $usrData->getPrenom(); ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Login:
                      </td>
                      <td>
                        <?php echo $usrData->getLogin(); ?>
                      </td>
                    </tr>
                    <tr>
                    <tr>
                      <td>Email:
                      </td>
                      <td>
                        <?php echo $usrData->getEmail(); ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Num Telephone:
                      </td>
                      <td>
                        <?php 
                        
                        
                        echo $usrData->getTel();
                         ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            </div>
            
            <!-- </form>-->
            <!-- MODAL -->
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Modifier Votre Profile
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>
                    <div class="panel-body">
                      <form action="controller/updateUser.php" method="POST">
                        <fieldset>
                          <div class="form-group">
                            <label>Nom
                            </label>
                            <input class="form-control" name="nom" placeholder="Nom " type="text" value=
                                   <?php echo $usrData->getNom();?> >
                          </div>
                          <div class="form-group">
                            <label>Prenom
                            </label>
                            <input class="form-control" name="prenom" placeholder="Prenom " type="text" value=
                                   <?php echo $usrData->getPrenom();?> >
                          </div>
                          <div class="form-group">
                            <label>Login
                            </label>
                            <input class="form-control" name="login" placeholder="Login" type="text" value=
                                   <?php echo $usrData->getLogin();?> >
                          </div>
                          <div class="form-group">
                            <label>Email
                            </label>
                            <input class="form-control" name="email" placeholder="Email" type="text" value=
                                   <?php echo $usrData->getEmail();?> >
                          </div>
                          <div class="form-group">
                            <label>N° Telephone
                            </label>
                            <input class="form-control" name="tel" placeholder="Telephone" type="text" value=
                                   <?php echo $usrData->getTel();?> >
                          </div>
                          <div class="form-group">
                            <label>Nouveau Password
                            </label>
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                          </div>
                          <div class="form-group">
                            <label>Retaper Votre Password
                            </label>
                            <input class="form-control" placeholder="Password" name="password2" type="password" value="">
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-4"><span class="badge badge-pill badge-info">
                            <label for="file-input" class=" form-control-label">Photo Profile</label></span></div>
                            <div class="btn btn-link btn-sm"><input type="file" id="file-input" name="pic" class="form-control-file"></div>
                        </div> 
                        </fieldset>
                        <?php
?>
                        </div>
                      </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">Confirmer
                    </button>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div> 
        <!-- .content -->
      </div>
    </div>
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
