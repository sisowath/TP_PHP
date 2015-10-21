<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
require_once './code/classes/User.php';
require_once './code/classes/UserDAO.php';
$u1 = new User();
$u1->setCourriel("admin");
$u1->setMotDePasse("admin");
$u1->setNom("Administrateur");
$u1->setRole("administrateur");
$u2 = new User();
$u2->setCourriel("admin1");
$u2->setMotDePasse("admin1");
$u2->setNom("Administrateur1");
$u2->setRole("administrateur");
$u3 = new User();
$u3->setCourriel("admin2");
$u3->setMotDePasse("admin2");
$u3->setNom("Administrateur2");
$u3->setRole("administrateur");
$u4 = new User();
$u4->setCourriel("admin3");
$u4->setMotDePasse("admin3");
$u4->setNom("Administrateur3");
$u4->setRole("administrateur");
$u5 = new User();
$u5->setCourriel("admin4");
$u5->setMotDePasse("admin4");
$u5->setNom("Administrateur4");
$u5->setRole("administrateur");

$dao = new UserDao();
$dao->create($u1);
$dao->create($u2);
$dao->create($u3);
$dao->create($u4);
$dao->create($u5);
        ?>
    </body>
</html>
