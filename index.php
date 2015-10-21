<!DOCTYPE html>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<html>
<head>
<title>The Club Soccer flat Responsive Sports Category Bootstrap Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Bootstrap Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'> 
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'> 
<script src="js/jquery-1.11.0.min.js"></script>
<!-- - - start-smoth-scrolling- - -->
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
<!-- - - start-smoth-scrolling- - -->
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
						<li><a href="contact.php">Contact</a></li>
					</ul>
                    <!-- - -start-top-nav-script- - -->
		            <script type="text/javascript" src="js/responsive-nav.js"></script>
					<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
					</script>
		<!-- - -//End-top-nav-script- - -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="banner"> 
	    <div class="banner-text">
	    	<div class="container">
				<h1>L'EDUCATION<br />PAR LE<br />SOCCER</h1>
				<!--p>HERE WE GOT SAME NEWS HERE</p>
				<div class="search">
					<input type="text" value="Search here..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search here...';}">
					<input type="submit" value="Find">
			 	</div-->
			 <!--/div-->
		</div>
            </div>
<?php
require_once 'code/classes/AlertDao.php';
$dao = new AlertDao();
$alerts = $dao->findAllActive();
if (count($alerts)>0)
{
?>            
            <div id="alertsContainer">
                <?php
                echo "<h3>".$alerts[0]->getTitle()."</h3><p>".$alerts[0]->getText()."</p>";
                ?>
            </div>
<?php
}
?>            
	<!--start-website-->
	<!--Responsive-tabs-Starts-Here-->
	</div>
	<div class="website">
		<div class="container">
			<div class="website-top">
				<h3>ABOUT OUR WEBSITE</h3>
			</div>
			<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>What we do</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>History</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>News</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>Clients</span></li>
							  <!--div class="clear"></div-->
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <img src="images/abt-img.png" alt="" />
									  <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>         
							        </div>
							     </div>	
							      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
									  <img src="images/abt-4.png" alt="" />
									  <p>Printer took a galley of when an unknown type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>         
							        </div>
							     </div>	
							      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									<div class="facts">
									  <img src="images/abt-2.png" alt="" />
									  <p>Took a galley of type and scrambled it to make awhen an unknown printer  type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>         
							        </div>  
							     </div>	
							     <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
									<div class="facts">
									  <img src="images/abt-3.png" alt="" />
									  <p>Galley of type and scrambled when an unknown printer took a it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>         
							        </div>     
							     </div>	
							 </div>
					      </div>
					 </div>
					 </div>
					</div> 
					 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					    <script type="text/javascript">
						    $(document).ready(function () {
						        $('#horizontalTab').easyResponsiveTabs({
						            type: 'default', //Types: default, vertical, accordion           
						            width: 'auto', //auto or any width like 600px
						            fit: true   // 100% fit in a container
						        });
						    });
						   </script>
					<!-- Partners Starts Here - -->
		<!--Responsive-tabs-ends-Here-->
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