<?php
session_start();
//print_r($_SESSION);
require_once "classes/user.php";
require_once 'conx/connexion.php';

if(!isset($_SESSION['id']))
{
header('location:home.php');

}
?>
<!DOCTYPE html>
<?php 

include_once './racine.php';

?>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest minified bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <!-- <script>
    $(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
    </script>
<style> 
    #panel, #flip {
        padding: 10px;
        text-align: left;
        background-color: #fff;
        border: solid 1px #e6f1f1;
    }
    
    #panel {
        padding: 50px;
        display: none;
    }
    </style>
-->
<!--Debut-->
<script>
function submitContactForm(){
    //alert("tsubmita");
    //var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var route = $('#inputroute').val();
    var nbrPlace = $('#inputnbrPlace').val();
    var heureDepart = $('#inputheureDepart').val();
    var dateTrajet = $('#inputdateTrajet').val();
    var commentaire = $('#inputcommentaire').val();
    if(route.trim() == '' ){
        alert('Please enter your route.');
        $('#inputroute').focus();
        return false;
    }else if(nbrPlace.trim() == '' ){
        alert('Please enter your nbrPlace.');
        $('#inputnbrPlace').focus();
        return false;
    }/*else if(nbrPlace.trim() != ''){
        alert('Please enter valid nbrPlace.');
        $('#inputnbrPlace').focus();
        return false;*/
    else if(heureDepart.trim() == '' ){
        alert('Please enter your heureDepart.');
        $('#inputheureDepart').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&route='+route+'&nbrPlace='+nbrPlace+'&heureDepart='+heureDepart+'&dateTrajet'+dateTrajet+'&commentaire'+commentaire,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                
                if(msg == 'ok'){
                    $('#inputroute').val('');
                    $('#inputnbrPlace').val('');
                    $('#inputheureDepart').val('');
                    $('#inputdateTrajet').val('');
                    $('#inputcommentaire').val('');
                    $('.statusMsg').html('<span style="color:green;">Modifier avec success.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Il ya une erreur, Veuillez resseayer a nouveau.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>
<!--FIN-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-10">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="home.php">Home</a></h1>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Compte <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.php">Profile</a></li>
	                          <li><a href="login.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
              <ul class="nav">
							<!-- Main menu -->
								<li class="current"><a href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
								<li><a href="ajoutPays.php"><i class="glyphicon glyphicon-plus"></i> Ajout des Pays</a></li>
                                <li><a href="ajoutVille.php"><i class="glyphicon glyphicon-plus"></i> Ajout des Villes</a></li>
								<li><a href="confTrajet.php"><i class="glyphicon glyphicon-dashboard"></i>Gestion des Trajets</a></li>
                                <li><a href="confUser.php"><i class="glyphicon glyphicon-user"></i>Gestion des Users </a></li>
								<li><a href="tables.php"><i class="glyphicon glyphicon-cog"></i> Parametres</a></li>
											</ul>
			 </div>
	
      </div>
 
          <div class="page-content">
            <div class="row">
                      <div class="col-md-9 col-md-offset">
                          <div class="row">
                              <!--button radio offre demande -->
                              <div ><center><h1><label>Listes des Users :</label></h1></center></div>
                              <div class="content-box-large">
                                    <div class="panel-heading">
                                      <!--<div class="panel-title"><h3 >Historique de Votre Covoiturage</h3></div>-->
                                      </div>
                                    <div class="panel-body">
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                          <thead>
                                              <tr>
                                                  <th>ID User</th>
                                                  <th>Nom</th>
                                                  <th>Prenom</th>
                                                  <th>Login</th>
                                                  <th>Email</th>
                                                  <th>Supprimer</th>
                                                  
                                              </tr>
                                          </thead>
                                          <?php
                                            include_once RACINE.'/service/UsrService.php';
                                            include_once RACINE.'/service/TrajetService.php';
                                            require_once(__DIR__.'/service/UsrService.php');
                                            require_once 'C:\xampp\htdocs\cov\service\UsrService.php';
                                            //$es = new UserService();
                                            $es = new UserService();
                                            foreach ($es->findAll() as $e) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $e->getId(); ?></td>
                                                    <td><?php echo $e->getNom(); ?></td>
                                                    <td><?php echo $e->getPrenom(); ?></td>
                                                    <td><?php echo $e->getLogin(); ?></td>
                                                    <td><?php echo $e->getemail(); ?></td>
                                                    <td><a class="btn btn-danger btn-xs" href="controller/DeleteUser.php?id=<?php echo $e->getId(); ?>">Supprimer</td>
                                                    <td>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalForm" role="dialog">
                                                        <div class="modal-dialog">
                                                            
                                                        </div>
                                                    </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                <?php } ?>
                                                                         
                                                                                            </table>
                                                                                        </div>
                                                                                        </div>
                                                                                
                                                                                </div>

                                                                                </div>
                                                                            </div>  
                                                                        </div>
                                                                        </div>  
                                                                    
                                                        </div>
                                                        </div>  
                                                                    <div class="row">
                                                                    <div class="col-md-12 panel-warning">
                                                                        <div class="content-box-header panel-heading">
                                                                            <div class="panel-title ">Allez ou vous voulez. D'ou vous voulez.</div>

                                                                        </div>
                                                                        <div class="content-box-large box-with-header">
                                                                            
                                                                            <br /><br />
                                                                        </div>
                                                                    </div>
                                                                </div>
		
		  	
		  	

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2018 <a href='#'></a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>

    <!-- Debut -->
    
    <!--Fin-->                                            


  </body>
</html>