<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alert
 *
 * @author usager
 */
class Alert {
    //put your code here
    private $id;
    private $title;
    private $text;
    private $date;
    private $active;    
    public function getId() {
        return $this->id;
    }
    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
    }

        public function getText() {
        return $this->text;
    }

    public function getDate() {
        return $this->date;
    }

    public function getActive() {
        return $this->active;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setActive($active) {
        $this->active = $active;
    }


}
