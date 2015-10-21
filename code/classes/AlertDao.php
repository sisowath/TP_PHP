<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlertDao
 *
 * @author usager
 */
require_once './code/classes/DataBase.php';
require_once './code/classes/Alert.php';
class AlertDao {
    //put your code here
    public function findAllActive() {
        $liste = Array();
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("SELECT * FROM alerts WHERE active=1");
        $pstmt->execute();
        //$result = $pstmt->fetch(PDO::FETCH_OBJ);

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Alert();
            $p->setId($result->id);
            $p->setTitle($result->title);
            $p->setText($result->text);
            $p->setDate($result->date);
            $p->setActive($result->active);
            array_push($liste, $p);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }
    public function findAll() {
        $liste = Array();
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("SELECT * FROM alerts ORDER BY active=1 DESC");
        $pstmt->execute();

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Alert();
            $p->setId($result->id);
            $p->setTitle($result->title);
            $p->setText($result->text);
            $p->setDate($result->date);
            $p->setActive($result->active);
            array_push($liste, $p);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }
}
