<?php
if (!ISSET($_SESSION)) session_start();
if (!ISSET($_SESSION['connected'])){
    header('Location:login.php');
    exit;
}
//require_once 'code/classes/Util.php';
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
<title>The Club Soccer flat Responsive Sports Category Bootstrap Website Template | Gallery :: w3layouts</title>
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
<!--end-smoth-scrolling-->
<!--start-gallery-->
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
   <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
<!--end-gallery-->
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
						<li><a href="gallery.php" class="active">Gallery</a></li>
						<li><a href="blogs.php">Blogs</a></li>
						<li><a href="contact.php">Contact</a></li>
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
	<!--Work-Starts-Here-->
	 <!-- content-section-starts -->
	 <div class="gallery-content">
	 <div class="container">
		<div class="gallery-content-head text-left">
			<h3>Gestion des photos</h3>
             <form id="listePhotos">
             </form>
<?php
require_once 'code/classes/PhotoDao.php';
require_once 'code/classes/Photo.php';
require_once 'code/classes/Util.php';
$dao = new PhotoDao();
$categories = $dao->getCategoriesList();
$seasons = $dao->getSeasonsList();
$afficheListe = TRUE;
if (ISSET($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'edit' :
            $afficheListe = FALSE;
            $p=$dao->findById($_REQUEST['id']);
            echo $dao->delete($_REQUEST['id']);  //$dao->findById($_REQUEST['id'])->getLink();
?>
			<h4>&Eacutedition</h4>
			<table>
				<tr>
					<td><img height='200' src='<?php echo "./".$p->getLink();?>' /></td>
					<td>
						<form action='' method="get">
<?php
							echo "". Util::getSelect($categories,$p->getCategory(),'category')
									."<br />" . Util::getSelect($seasons,$p->getSeason(),'season')."<br />"
									. "<input type='text' name='title' value='". $p->getTitle()."' /><br />"
									. "<textarea name='description'>".$p->getDescription()."</textarea><br />";
?>
							<input type='hidden' name='action' value="save" />
							<input type='hidden' name='what' value="photo" />
							<input type='hidden' name='id' value="<?php echo $p->getId();?>" />
							
							<input type='submit' name='save' value="Sauvegarder" />
							<input type='submit' name='cancel' value="Annuler" />
						</form>
						<a href="?action=edit&what=photo&id=<?php echo $p->getId();?>"><img height="30" title="editer" src="images/edit.png" /></a>
						<a href="?action=suppHide&what=photo&id=<?php echo $p->getId();?>"><img src="images/delete.png" /><img src="images/show.png" /><img src="images/hide.png" /></a>
					</td>
				</tr>
			</table>
<?php
			break;
        case 'save' :
            //TODO$p=$dao->findById($_REQUEST['id']);
			$category = $_REQUEST['category'];
			$season = $_REQUEST['season'];
			$title = $_REQUEST['title'];
			$description = $_REQUEST['description'];
			$unePhoto = new Photo();
			$unePhoto->setId( $_REQUEST['id'] );
			$unePhoto->setCategory( $category );
			$unePhoto->setSeason( $season );
			$unePhoto->setTitle( $title );
			$unePhoto->setDescription( $description );
			$dao->update( $unePhoto );
			break;
        case 'hide' :
            $dao->hide($_REQUEST['id']);
			break;
        case 'show' :
            $dao->show($_REQUEST['id']);
			break;
        case 'del' :
            $dao->delete($_REQUEST['id']);
            //TODO$p=$dao->findById($_REQUEST['id']);
?>
<?php
                }
}                
if ($afficheListe) {
    $liste = $dao->findAll(0,0,0);
?>				
				<a href="logout.php">Se d&eacute;connecter</a><br/><br/>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Ajouter une image :</td>
							<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
							<td><input type="submit" value="T&eacute;l&eacute;verser" name="submit"></td>																											
						</tr>
					</table>
				</form>
				<br/><br/>
                 <table id="tListePhotos">
<?php
                    $cpt = 0;
                     foreach ($liste as $v) {
                         if ($cpt%3==0) {
                             echo "<tr class='photo'>";
                         }
                         echo "<td><img height='80' src='./".$v->getLink()."'".(($v->isHidden()?" class='cachee'":""))." />"
?>
                     <br /><a href="?action=edit&what=photo&id=<?php echo $v->getId();?>"><img height="20" title="editer" src="images/edit.png" /></a>
<?php
                    if ($v->isHidden()) {
?>                        
                        <a href="?action=del&what=photo&id=<?php echo $v->getId();?>"><img height="20" src="images/delete.png" /></a>
                        <a href="?action=show&what=photo&id=<?php echo $v->getId();?>"><img height="20" src="images/show.png" /></a>
<?php
                    }
                    else {
?>                        
                     <a href="?action=hide&what=photo&id=<?php echo $v->getId();?>"><img height="20" src="images/hide.png" /></a>
<?php
                    }
?>
                     
<?php                     
                         echo "</td><td><ul><li>"
                                 . $v->getCategory()."</li><li>"
                                 . $v->getSeason()."</li><li>"
                                 . $v->getTitle()."</li><li>"
                                 . $v->getDescription()."</li></ul></td>";
                         //. Util::getSelect($categories,$v->getCategory())
                         $cpt++;
                         if ($cpt%3==0) {
                             echo "</tr>";
                         }
                     }
                     if ($cpt-1%3!=0) {
                        echo "</tr>";
                     }
?>
                 </table>				 
<?php
    }
?>    
		</div>
				
   </div>
</div>
	 <!-- content-section-ends -->
	<!--Work-Ends-Here-->
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