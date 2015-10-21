<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Photo
 *
 * @author usager
 */
class Photo {
    //put your code here
    private $id;
    private $link;
    private $title;
    private $description;
    private $category;
    private $season;
    private $hidden = TRUE;

    public function isHidden() {
        return $this->hidden;
    }
    public function setHidden($hidden) {
        $this->hidden = $hidden;
    }
    function getSeason() {
        return $this->season;
    }

    function setSeason($season) {
        $this->season = $season;
    }

	public function getId() {
        return $this->id;
    }

    public function getLink() {
        return $this->link;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function setTitle($titre) {
        $this->title = $titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
    public function loadFromObject($result) {
        $this->setId($result->id);
        $this->setLink($result->link);
        $this->setTitle($result->title);
        $this->setDescription($result->description);
        $this->setCategory($result->category);
        $this->setSeason($result->season);
        $this->setHidden($result->hidden);
    }
    public function loadFromArray($t) {
        $this->setId($t["id"]);
        $this->setLink($t["link"]);
        $this->setTitle($t["title"]);
        $this->setDescription($t["description"]);
        $this->setCategory($t["category"]);
        $this->setSeason($t["season"]);
        $this->setHidden($t["hidden"]);
    }
}
