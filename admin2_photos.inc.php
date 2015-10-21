<!DOCTYPE HTML>
<!-- saved from url=(0047)http://getbootstrap.com/examples/justified-nav/ -->
<!DOCTYPE html PUBLIC "" ""><HTML lang="en"><HEAD><META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge">     
<META name="viewport" content="width=device-width, initial-scale=1">     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --> 
    
<META name="description" content="">     
<META name="author" content="">     <LINK href="../../favicon.ico" rel="icon">   
  <TITLE>Justified Nav Template for Bootstrap</TITLE>     <!-- Bootstrap core CSS --> 
<!--link href="css/style.css" rel='stylesheet' type='text/css' /-->

  <LINK href="admin/bootstrap.min.css" rel="stylesheet">     
    <!-- Custom styles for this template -->     
    <LINK href="admin/justified-nav.css" rel="stylesheet">     
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! --> 
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]--> 
    
<SCRIPT src="admin/ie-emulation-modes-warning.js"></SCRIPT>
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
  
<META name="GENERATOR" content="MSHTML 11.00.9600.17842"></HEAD>   
<BODY>
    
<DIV class="container"><!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. --> 
      
<DIV class="masthead">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""></a>
			</div>
<H3 class="btn-success">Administration</H3>
<NAV>
 <UL class="nav nav-justified">
  <LI class="active"><A 
  href="http://getbootstrap.com/examples/justified-nav/#">Alertes</A></LI>
  <LI><A 
  href="http://getbootstrap.com/examples/justified-nav/#">Photos</A></LI>
  <LI><A 
  href="http://getbootstrap.com/examples/justified-nav/#">Actualité</A></LI>
  <LI><A 
  href="http://getbootstrap.com/examples/justified-nav/#">Downloads</A></LI>
  <LI><A href="http://getbootstrap.com/examples/justified-nav/#">About</A></LI>
  <LI><A 
href="http://getbootstrap.com/examples/justified-nav/#">Déconnexion</A></LI></UL></NAV></DIV><!-- Jumbotron --> 

<h3>Gestion de photos</h3>
<!-- Example row of columns -->       
<DIV class="row">
<DIV class="col-lg-12">
<div>
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
                            <tr><td>
                                <img height='200' src='<?php echo "./".$p->getLink();?>' />
                                </td>
                                <td>
                                    <form action='' method="get">
                                <?php
                                    echo "". Util::getSelect($categories,$p->getCategory(),'categoty')."<br />"
                                                . Util::getSelect($seasons,$p->getSeason(),'season')."<br />"
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
</DIV>
</DIV><!-- Site footer -->       <FOOTER class="footer">
<P>© Company 2014</P></FOOTER></DIV><!-- /container -->     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
    
<SCRIPT src="Justified%20Nav%20Template%20for%20Bootstrap_fichiers/ie10-viewport-bug-workaround.js"></SCRIPT>
   </BODY></HTML>
