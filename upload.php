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
<div class="gallery-content">
	<div class="container">
          
		<?php
		require_once 'code/classes/DataBase.php';
		require_once 'code/classes/Photo.php';
		require_once 'code/classes/PhotoDao.php';
		require_once 'code/classes/Util.php';

		$target_dir = "photos/";// Il faut un repertoire uploads pour cela fonctionne
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Vérifier si le fichier est bien une image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo nl2br("Le fichier est une image - " . $check["mime"] . ". \n");
				$uploadOk = 1;
			} else {
				echo "Le fichier n'est pas une image. ";
				$uploadOk = 0;
			}
		}
		// Verifier si le fichier existe déja
		if (file_exists($target_file)) {
			echo "L'image &eacute;xiste d&eacute;j&agrave;. ";
			$uploadOk = 0;
		}
		// Vérifier la taille du fichier
		if ($_FILES["fileToUpload"]["size"] > 900000) {
			echo "La taille de l'image est trop grande.";
			$uploadOk = 0;
		}
		// Vérifier le type de fichier
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Seulement les fichiers JPG, JPEG, PNG et GIF sont permis. ";
			$uploadOk = 0;
		}
		// $uploadOk sera à 0 s'il y a une erreur
		if ($uploadOk == 0) {
			echo "Votre fichier n'a pas pu &ecirc;tre ajout&eacute;. ";
		// Sinon le fichier sera transferer
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				// ajouter la photo dans le dossier PHOTOS
				echo "L'image ". basename( $_FILES["fileToUpload"]["name"]). " a &eacute;t&eacute; ajout&eacute;. ";
				
				// Insérer un nouveau enregistrement dans la table PHOTO
				$category = "no category";
				$season = "no season";
				$title = basename($_FILES["fileToUpload"]["name"]);
				$description = "no description";		
				$link = $target_file;
				
				$unePhoto = new Photo();
				//$unePhoto->setId( $_REQUEST['id'] );
				$unePhoto->setCategory( $category );
				$unePhoto->setSeason( $season );
				$unePhoto->setTitle( $title );
				$unePhoto->setDescription( $description );
				$unePhoto->setLink( $link );
				$unePhoto->setHidden(0);					
				$dao = new PhotoDao();
				$dao->create( $unePhoto );
			} else {
				echo "D&eacute;sol&eacute;, une erreur s'est produite.";
			}
		}
		// Source de : http://www.w3schools.com/
		?>
		<br/>
		<br/>
		<a href="./admin.php?what=photo"><b><u>Retourner &agrave; la gestion des photos</u></b></a>
		
	</div>
</div>
</body>
</html>