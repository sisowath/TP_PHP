<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhotoDao
 *
 * @author usager
 */

require_once 'code/classes/DataBase.php';
require_once 'code/classes/User.php';
class UserDao {
    public function create($u) {
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("INSERT INTO `clubsoccer`.`user` (`courriel`, `mdp`, `nom`, `role`) VALUES (:c, :m, :n, :r);");       
        $pstmt->execute(array('c' => $u->getCourriel(),'m' => $u->getMotDePasse(),'n' => $u->getNom(),'r' => $u->getRole()));
        $pstmt->closeCursor();
        DataBase::close();
    }
    public function get($courriel) {
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("SELECT * FROM user WHERE courriel = :c");       
        $pstmt->execute(array('c' => $courriel));
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        if ($result)
        {
            $u = new User();
            $u->loadFromObject($result);
            $pstmt->closeCursor();
            DataBase::close();
            return $u;
        }
        $pstmt->closeCursor();
        DataBase::close();
        return NULL;
    }
}
