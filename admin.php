<?php
if (!ISSET($_SESSION)) session_start();
if (!ISSET($_SESSION['connected'])){
    header('Location:login.php');
    exit;
}
if (ISSET($_REQUEST['what'])) {
    switch ($_REQUEST['what']) {
        case 'photo' :
            include_once 'admin_photos.inc.php';
            exit;
        break;
        case 'alert' :
            include_once 'admin_alerts.inc.php';
            exit;
        break;
        
    }
}
include_once 'admin.inc.php';
?>