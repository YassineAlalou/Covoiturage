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
                    <a href="home.php">
                        <h3 class="align-content" src="#" alt="">Covoiturage</h3>
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="controller/addUser.php" >
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom"class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Retaper votre Mot de passe</label>
                            <input type="password" name="password2" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">S'enregistrer</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Déja avoir un compte? <a href="./login.php"> S'authentifier</a></p>
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
