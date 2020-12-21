<?php
session_start();
//print_r($_SESSION);
include_once './racine.php';
include_once RACINE."/service/UsrService.php";


if(!empty($_POST['Login']) AND !empty($_POST['log']) AND !empty($_POST['password']))
{

 $login = $_POST['log'];
 $pass = $_POST['password'];
 
 
 $user = new UserService(); 

 if($user->login($login,$pass))
 {  
	if($login == 'admin' and $pass == 'admin'){	
        header('location:indexAdmin.php');}
    else 
        header('location:home.php');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}/*
if(isset($error))
            {
?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }*/
//var_dump($_SESSION['id']);
/*
if(isset($_SESSION['id']))
{
header('location:home.php');

}*/
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="" alt="">
                    </a>
                </div>
                <div class="login-form">
                <form method="POST">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="log" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Mot De Passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Mot De Passe">
                        </div>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="forgot.php">Mot de passe oublié?</a>
                            </label>

                        </div>
                        <button type="submit" name="Login" value="Login" class="btn btn-success btn-flat m-b-30 m-t-30">CONNEXION</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Posséde pas d'un compte ? <a href="inscription.php"> S'inscrire</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
