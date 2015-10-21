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
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>The Club Soccer flat Responsive Sports Category Bootstrap Website Template | Contact :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="./css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="./css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'> 
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'> 
<script src="js/jquery-1.11.0.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="./js/move-top.js"></script>
<script type="text/javascript" src="./js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
</script>
<!---- start-smoth-scrolling---->
</head>
<body>
	<div class="head" id="home">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""></a>
			</div>
			<div class="header">
				<div class="menu">
                    <a class="toggleMenu" href="#"><img src="images/menu-icon.png" alt="" /> </a>
					<ul class="nav" id="nav">
						<li><a href="index.php">Home</a></li>
					</ul>
                    <!----start-top-nav-script---->
		            <script type="text/javascript" src="js/responsive-nav.js"></script>
					<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
					</script>
		<!----//End-top-nav-script---->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--start-contact-->
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<h3>ADMINISTRATION</h3>
				<div class="contact-bottom">
					<div class="col-md-6 contact-bottom-left">
					</div>
					<div class="col-md-6 contact-bottom-right">
						<form action="" method="post">
							<div class="contact-txt">
<?php
								echo ($message=="")?"":"<span class='error'>".$message."</span><br />";
?>
							<input type="text" name="courriel" value="Courriel" onfocus="if (this.value == 'Courriel') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Courriel';}"/>
							<input type="password" name="motDePasse" value="Mot de passe" onfocus="if (this.value == 'Mot de passe') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Mot de passe';}"/>
							</div>
							<div class="contact-textarea">
							</div>
							<div class="contact-but">
								<input type="submit" value="CONNECTER" >
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--end-contact-->
	<!--start-footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-main">
				<h3>SUBSCRIBE TO NEWSLETTER</h3>
				<div class="footer-bottom">
					<div class="col-md-4 footer-bottom-left">
						<img src="images/msg.png" alt="">
					</div>
					<div class="col-md-8 footer-bottom-right">
						<small>Enter Your Email here</small>
						<div class="contact-text">
							<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
							<input type="submit" value="SUBMIT" >
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="ftr">
						<p>DESIGN BY <a href="http://w3layouts.com/"> W3LAYOUTS</a></p>
					</div>
				</div>
			</div>
		</div>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--end-footer-->
</body>
</html>