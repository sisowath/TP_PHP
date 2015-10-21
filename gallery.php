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
                                $('#bOK').hide();
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
			<h3>Gallerie Photos</h3>
                        <form id="listePhotos" action="" method="get">
<?php
require_once 'code/classes/PhotoDao.php';
require_once 'code/classes/Photo.php';
$dao = new PhotoDao();
$categories = $dao->getCategoriesList();
$seasons = $dao->getSeasonsList();
$taillePage = 12;   //12 photos by page
$selected = " selected='selected'";
if (!ISSET($_SESSION)) session_start ();
if ((ISSET($_REQUEST['photosCategory']))) {
    UNSET($_SESSION['nbResultats']);
    if ($_REQUEST['photosCategory']=="all")
        UNSET($_SESSION['selectedCategory']);
    else    
        $_SESSION['selectedCategory'] = $_REQUEST['photosCategory'];
}
if ((ISSET($_REQUEST['photosSeason']))) {
    UNSET($_SESSION['nbResultats']);
    if ($_REQUEST['photosSeason']=="all")
        UNSET($_SESSION['selectedSeason']);
    else    
        $_SESSION['selectedSeason'] = $_REQUEST['photosSeason'];
}
$cas = "";
if (ISSET($_SESSION['selectedCategory']))
        $cas = $cas."c";
if (ISSET($_SESSION['selectedSeason']))
        $cas = $cas."s";
$page = 1;
if (ISSET($_REQUEST['page']))
    $page = $_REQUEST['page'];
$liste = NULL;
switch ($cas) {
    case "c" : //category only
        if (!ISSET($_SESSION['nbResultats']))
            $_SESSION['nbResultats'] = count($dao->findByCategory($_SESSION['selectedCategory']));
        $liste = $dao->findByCategory($_SESSION['selectedCategory'],$page,$taillePage);
    break;
    case "s" : //season only
        if (!ISSET($_SESSION['nbResultats']))
            $_SESSION['nbResultats'] = count($dao->findBySeason($_SESSION['selectedSeason']));
        $liste = $dao->findBySeason($_SESSION['selectedSeason'],$page,$taillePage);
    break;
    case "cs" : //category and season only
        if (!ISSET($_SESSION['nbResultats']))
            $_SESSION['nbResultats'] = count($dao->findBySeasonAndCategory($_SESSION['selectedCategory'],$_SESSION['selectedSeason']));
        $liste = $dao->findBySeasonAndCategory($_SESSION['selectedCategory'],$_SESSION['selectedSeason'],$page,$taillePage);
    break;
    default : //none of them
        if (!ISSET($_SESSION['nbResultats']))
            $_SESSION['nbResultats'] = count($dao->findAll());
        $liste = $dao->findAll($page,$taillePage);
}

$nbPages = (int)(($_SESSION['nbResultats']-1)/$taillePage) + 1;

                if (count($categories)>1)
                {
                    $selectedCategory = (ISSET($_SESSION['selectedCategory']))?$_SESSION['selectedCategory']:null;
?>
                            <select name="photosCategory" onchange="this.form.submit()">
                    <option value='all'>Toutes les cat&eacute;gories</option>

<?php
                     foreach ($categories as $value) {
                         echo "<option value='".$value."' ".(($selectedCategory==$value)?$selected:"").">".$value."</option>";
                     }
?>
                 </select>
<?php
                }
                if (count($seasons)>1)
                {
                    $selectedSeason = (ISSET($_SESSION['selectedSeason']))?$_SESSION['selectedSeason']:null;
?>                 
                 <select name="photosSeason" onchange="this.form.submit()">
                    <option value='all'>Toutes les saisons</option>
<?php
                     foreach ($seasons as $value) {
                         echo "<option value='".$value."' ".(($selectedSeason==$value)?$selected:"").">".$value."</option>";
                     }
?>
                 </select>
<?php
                }
?>                 
                <input type='submit' value="OK" id='bOK' />
             </form>
<?php
/*if (ISSET($_SESSION['selectedCategory']))
        echo "<br />category = ".$_SESSION['selectedCategory'];
if (ISSET($_SESSION['selectedSeason']))
        echo "<br />season = ".$_SESSION['selectedSeason'];
echo "<br />cas = ".$cas;
echo "<br />Nombre de résultats : ".$_SESSION['nbResultats'];
echo "<br />Taille des pages : ".$taillePage;
echo "<br />Nombre de pages : ".$nbPages;*/
if ($nbPages > 1){
?>    
                <div class="blog-bottom">
                        <ul>
<?php
        if ($page>1){
            echo "<li><a href='?page=".($page-1)."' class='active'>PREV</a></li>";            
        }
        for ($i=1;$i<=$nbPages;$i++)
            if ($i==$page) {
                echo "<li><a href='?page=".($i)."' class='inactive'>".$i."</a></li>";  
            }
            else {
                echo "<li><a href='?page=".($i)."' class='active'>".$i."</a></li>";  
            }
        if ($page<$nbPages){
            echo "<li><a href='?page=".($page+1)."' class='active'>NEXT</a></li>";            
        }
?>
                        </ul>
                </div>
<?php    
}
?>
			<!--p>Eum cu tantas legere complectitur, hinc utamur ea eam. Eum patrioque mnesarchum eu, diam erant convenire et vis. Et essent evertitur sea, vis cu ubique referrentur, sed eu dicant expetendis.</p-->
		</div>
<?php
$nbAAfficher = count($liste);
$nbColonnes = 4;
$nbLignes = (int)(($nbAAfficher-1)/$nbColonnes)+1;
$k=0;
for ($i=0;$i<$nbLignes;$i++) {
    echo "<div class='section group'>";
    for ($j=0;$j<$nbColonnes;$j++){
        $photo = $liste[$k];
?>   
        <div class="grid_1_of_4 images_1_of_4">
            <a class="fancybox" href="<?php echo $photo->getLink();?>" data-fancybox-group="gallery" title="<?php echo $photo->getTitle();?>"><img src="<?php echo $photo->getLink();?>" class="img-style row6" alt=""><span> </span></a>
        </div>             
<?php   
        $k++;
        if ($k>=$nbAAfficher) break;
    }    
    echo "</div>";
    if ($k>=$nbAAfficher) break;
}
?>             
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