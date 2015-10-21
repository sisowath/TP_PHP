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
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'> 
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'> 
<script src="js/jquery-1.11.0.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
						<li><a href="about.php">About</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="blogs.php">Blogs</a></li>
						<li><a href="contact.php" class="active">Contact</a></li>
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
				<h3>CONTACTEZ-NOUS</h3>
				<div class="contact-bottom">
					<div class="col-md-6 contact-bottom-left">
						<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31085.222516274745!2d77.60788050000001!3d13.121167000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1small+near+Road%2C+Yelahanka+Airforce+Base%2C+Bengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1420458959901" frameborder="0" style="border:0"></iframe>
					</div>
					<div class="col-md-6 contact-bottom-right">
						<div class="contact-txt">
							<input type="text" name="nom" value="NOM Pr&eacute;nom" onfocus="if (this.value == 'NOM Pr&eacute;nom') {this.value = '';}" onblur="if (this.value == '') {this.value = 'NOM Pr&eacute;nom';}"/>
							<input type="text" name="tel" value="T&eacute;l&eacute;phone" onfocus="if (this.value == 'T&eacute;l&eacute;phone') {this.value = '';}" onblur="if (this.value == '') {this.value = 'T&eacute;l&eacute;phone';}"/>
							<input type="text" value="Courriel" onfocus="if (this.value == 'Courriel') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Courriel';}"/>
						</div>
						<div class="contact-textarea">
							<textarea value="Votre message" onfocus="if (this.value == 'Votre message') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Votre message';}">Votre message</textarea>
						</div>
						<div class="contact-but">
							<input type="submit" value="ENVOYER" >
							<!--input type="submit" value="CLEAR" -->
						</div>
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