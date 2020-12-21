<?php
session_start();
include_once './racine.php';
require_once "classes/user.php";
require_once 'conx/connexion.php';
require_once 'service/UsrService.php';
//print_r($_SESSION);

//include_once 'C:/xampp/htdocs/newtemp/classes/user.php';

//include_once 'C:/xampp/htdocs/newtemp/conx/connexion.php';

if(empty($_SESSION['id']) or $_SESSION['id']==78)
{
header("Location:login.php");
$usr = new UserService();
$usr->logout();
session_destroy(); 
}
$profCheck = new UserService();
?>
<?php
include_once './racine.php';
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Covoiturage</title>
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php"> <i class="menu-icon fa  fa-home"></i>Acceuil </a>
                    </li>
                    <h3 class="menu-title">Options :</h3><!-- /.menu-title -->
                    <li>
                        <a href="cree.php"> <i class="menu-icon ti-car"></i>Ajouter Trajet </a>
                    </li>
                    <li>
                        <a href="historique.php"> <i class="menu-icon ti-save"></i>Historique </a>
                    </li>
                    <li>
                        <a href="profile.php"> <i class="menu-icon ti-user"></i>Profile </a>
                    </li>
                    <?php
                    $ab = new UserService();
                    $arije = $ab->findById($_SESSION['id']);
                    if($arije->getActif()== 0){ ?>
                         <li>
                            <a href="activation.php"> <i class="menu-icon ti-bell"></i>Activer Compte </a>
                        </li>;
                    <?php }

                    ?>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel hideen bel and msg feature-->

    <div  id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <!-- Hidden bel and msg feature-->
                    <div hidden class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src=<?php $img = $profCheck->findById($_SESSION['id']); 
                                                        echo 'images/'.$img->getImg(); ?>   alt="User Avatar">
              </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="profile.php"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div hidden class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Mes Trajets :</strong>
                        </div>
                        <div class="card-body">
                 <!-- <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                      </tr>
                      <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>$170,750</td>
                      </tr>

                    </tbody>
                  </table>-->
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
                                          <thead>
                                              <tr>
                                                  <th>Code Trajet</th>
                                                  <!--<th>Type</th>-->
                                                  <th>Type de Route</th>
                                                  <th>Date Trajet</th>
                                                  <th>heure Depart</th>
                                                  <th>Nombre Places</th>
                                                  <th>Supprimer</th>
                                                  <th>Localiser</th>
                                                  
                                              </tr>
                                          </thead>
                                          <?php

                                           
                                            include_once RACINE.'/service/UsrService.php';
                                            //include_once 'C:/xampp/htdocs/newtemp/service/UsrService.php';
                                          include_once RACINE.'/service/TrajetService.php';
                                          //include_once 'C:/xampp/htdocs/newtemp/service/TrajetService.php';
                                            //require_once(__DIR__.'/service/UsrService.php');
                                            //$es = new UserService();
                                            $es = new TrajetService();
                                            $id = $_SESSION['id'];
                                            foreach ($es->findById($id) as $e) {
                                                
                                            ?>
                                                <tr>
                                                    <td><?php echo $e->getcodeTrajet(); ?></td>                                                  
                                                    <td><?php if($e->getroute()==1) echo "Regional";
                                                    if($e->getroute()==2) echo"Auto Route";
                                                    if($e->getroute()==3) echo"Nationale";?></td>
                                                    <td><?php echo $e->getdateTrajet(); ?></td>
                                                    <td><?php echo $e->getheurDepart(); ?></td>
                                                    <td><?php echo $e->getnbrplaces(); ?></td>
                                                    <td><a class="btn btn-danger btn-xs" href="controller/DeleteTrajet.php?id=<?php echo $e->getcodeTrajet(); ?>">Supprimer</td>
                                                    <td>
                                                    <a class="ti-location-pin" href="/newtemp/mapAPI.php?id=<?php echo $e->getcodeTrajet();?>" >
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->

            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    
   

</body>
</html>
