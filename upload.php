<?php
require_once 'code/classes/DataBase.php';
require_once 'code/classes/Photo.php';
require_once 'code/classes/PhotoDao.php';
require_once 'code/classes/Util.php';

$target_dir = "photos/";// Il faut un repertoire uploads pour cela fonctionne
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 900000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // ajouter la photo dans le dossier PHOTOS
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		// insérer un nouveau enregistrement dans la table PHOTO
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
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<br/>
<a href="./admin.php?what=photo">Retourner à la gestion des photos</a>