<?php
if (!ISSET($_SESSION)) session_start ();
if (ISSET($_SESSION['connected'])) {    
    header("Location: index.php");
    exit;
}
$courrier = "Courriel";
$message = "";

if (ISSET($_REQUEST['courriel'])) {
    $courriel = $_REQUEST['courriel'];
    $motDePasse = $_REQUEST['motDePasse'];
    require_once '/code/classes/UserDao.php';
    require_once '/code/classes/User.php';
    $dao = new UserDao();
    $u = $dao->get($courriel);
    if ($u == NULL) {
        $message = $courriel . ' introuvable';
    } else if ($u->getMotDePasse() != $_REQUEST['motDePasse']) {
        $message = "Mot de passe &eacute;rron&eacute;";
    } else {
        $_SESSION['connected'] = $u->getNom();
        header("Location: admin.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="signin/bootstrap.css" rel="stylesheet">
<link href="./css/style.css" rel='stylesheet' type='text/css' />

    <!-- Custom styles for this template -->
    <link href="signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="signin/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <form class="form-signin" method="post">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""></a>
			</div>
        <h2 class="form-signin-heading">Connexion</h2>
        <?php
            echo ($message=="")?"":"<span class='error'>".$message."</span><br />";
        ?>
        <label for="courriel" class="sr-only">Courriel</label>
        <input id="courriel" name="courriel" class="form-control" placeholder="Courriel" required="" autofocus="" type="text">
<!--input type="text" name="courriel2" value="Courriel" onfocus="if (this.value == 'Courriel') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Courriel';}"/-->
<label for="motDePasse" class="sr-only">Mot de passe</label>
        <input id="motDePasse" name="motDePasse" class="form-control" placeholder="Mot de passe" required="" type="password">
<!--input type="password" name="motDePasse" value="Mot de passe" onfocus="if (this.value == 'Mot de passe') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Mot de passe';}"/-->        <div class="checkbox">
          <!--label>
            <input value="remember-me" type="checkbox"> Remember me
          </label-->
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"> Go </button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Signin%20Template%20for%20Bootstrap_fichiers/ie10-viewport-bug-workaround.js"></script>
  

</body></html>