<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author moumene
 */
class User {
    private $courriel;
    private $motDePasse;
    private $nom;
    private $role;
    
    function getCourriel() {
        return $this->courriel;
    }

    function getMotDePasse() {
        return $this->motDePasse;
    }

    function getNom() {
        return $this->nom;
    }

    function getRole() {
        return $this->role;
    }

    function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setRole($role) {
        $this->role = $role;
    }
    public function loadFromObject($result) {
        $this->setCourriel($result->courriel);
        $this->setNom($result->nom);
        $this->setRole($result->role);
        $this->setMotDePasse($result->mdp);
    }
}
