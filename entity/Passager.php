<?php
namespace entity;

class Passager{
    private $numPassager;
    private $civilite;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $reservation;
    
    function __construct($numPassager, $civilite, $nom, $prenom, $dateNaissance, Reservation $reservation) {
        $this->numPassager = $numPassager;
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->reservation = $reservation;
    }
    
    public function getNumPassager() {
        return $this->numPassager;
    }

    public function setNumPassager($numPassager) {
        $this->numPassager = $numPassager;
    }

    public function getCivilite() {
        return $this->civilite;
    }

    public function setCivilite($civilite) {
        $this->civilite = $civilite;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    public function getReservation() {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation) {
        $this->reservation = $reservation;
    }


}
?>
