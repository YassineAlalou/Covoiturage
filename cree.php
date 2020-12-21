<?php
session_start();
include_once './racine.php';
require_once "classes/user.php";
require_once 'conx/connexion.php';
require_once 'service/UsrService.php';
if(empty($_SESSION['id']) or $_SESSION['id']==78)
{
header("Location:login.php");
$usr = new UserService();
$usr->logout();
session_destroy(); 
}
$profCheck = new UserService();
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

    <link href="assets/css/bootstrap-datetimepicker.css">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--<script type="text/javascript" src="js/datatables.min.js"></script>-->
    <script src="assets/js/ajax.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="assets/js/jquery.tagsinput.js">
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
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
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>
<script>
    var listville = [];

 function deletethisbra(valeur){
    var ele = $("#ville_"+valeur);
    var text = $("#ville_"+valeur+" span:first-child").text();
    ele.slideUp("2000");
    setTimeout(function(){ ele.remove(); }, 2000);
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

        $('[name=idVille] option').filter(function(){
            return this.value == valeur
        }).remove();   
            
    })
  });

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
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
        <div class="card-header bg-dark">
            <strong class="card-title text-light">Creation d'offre :</strong>
        </div>
        </div>
            <div class="content mt-3">    
            <form action="/newtemp/controller/AddTrajet.php" method="POST">       
                    <!--Start-->
                    <div class="row form-group">
                    <?php
                    require_once 'C:\xampp\htdocs\newtemp\conx\connexion.php';
                    $bd = new Connexion();
                    $stmt = $bd->getConnexion()->prepare("Select * from Pays");
                    $stmt->execute();
                    $data = $stmt->fetchAll();
                    //$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($stmt);
                    //var_dump($data);
                ?>
                <div class="col col-md-3"><label for="select_1" class=" form-control-label">Pays</label></div>
                <div class="col-12 col-md-12">
                    <select name="idPays" id="idPays" class="form-control action">
                        <option selected="selected">
                        </option>
                        <?php 
                        foreach($data as $role): ?>
                                <option value="<?php echo $role['idPays'] ?>"><?php echo $role['nomPays'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                </div>
                    <div class="row form-group">
                        <div class="col col-md-3"></div>
                            <div class="col-12 col-md-12">
                                    <select name="idVille" id="idVille" class="form-control">
                                    <option value="">Choisir une Ville</option>
                                </select>
                            </div>
                    </div>
                        <div>
                        <button id="bn1" type="button" name="btina" class="btn btn-primary btn-sm" >
                            <i class="fa fa-dot-circle-o"></i> Ajouter Ville
                        </div>
                        <div class="row">
                            <div id="vs-block" class="col-md-12"></div>
                        </div>
                    <br>
                    <br>
                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Type Route</label></div>
                                    <div class="col-12 col-md-12">
                                    <select name="route" id="select" class="form-control">
                                        <option value="0">-</option>
                                        <option value="1">Regionale</option>
                                        <option value="2">Auto-Route</option>
                                        <option value="3">Nationale</option>
                                    </select>
                                    </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre de Places</label></div>
                        <div class="col-12 col-md-12"><input type="number" name="nbrPlaces" id="text-input" placeholder="" class="form-control">
                            <small class="form-text text-muted">Nombre de place vide dans votre vehicule</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date Depart</label></div>
                        <div class="col-12 col-md-12"><input type="date" name="dateTrajet" id="text-input" placeholder="" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Heure Depart</label></div>
                        <div class="col-12 col-md-12"><input type="time" id="text-input" name="heurDepart" placeholder="" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Information Additionnelle</label></div>
                        <div class="col-12 col-md-12"><textarea name="commentaire" id="textarea-input" rows="4" placeholder="" class="form-control"></textarea></div>
                    </div>
                </div>
                <div class="card-footer">
                <center><button type="submit" class="btn btn-primary btn-sm" onclick="success();" >
                    <i class="fa fa-dot-circle-o"></i> Envoyer
                </button></center>
            </div>
            </form>
            </div> <!-- .content -->
           
    </div>
    </div>
        
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    
    

    
    
    
    
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    
   

</body>
</html>
