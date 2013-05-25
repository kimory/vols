<?php
namespace entity;

use entity\Destination;

class Vol{
    private $numvol;
    private $lieuDepart;
    private $lieuArrivee;
    private $dateDepart;
    private $heureDepart;
    private $dateArrivee;
    private $HeureArrivee;
    private $DureeTrajet;
    
    function __construct($numvol, Destination $lieuDepart, Destination $lieuArrivee, $dateDepart, $heureDepart, $dateArrivee, $HeureArrivee, $DureeTrajet) {
        $this->numvol = $numvol;
        $this->lieuDepart = $lieuDepart;
        $this->lieuArrivee = $lieuArrivee;
        $this->dateDepart = $dateDepart;
        $this->heureDepart = $heureDepart;
        $this->dateArrivee = $dateArrivee;
        $this->HeureArrivee = $HeureArrivee;
        $this->DureeTrajet = $DureeTrajet;
    }
    
    public function getNumvol() {
        return $this->numvol;
    }

    public function setNumvol($numvol) {
        $this->numvol = $numvol;
    }

    public function getLieuDepart() {
        return $this->lieuDepart;
    }

    public function setLieuDepart(Destination $lieuDepart) {
        $this->lieuDepart = $lieuDepart;
    }

    public function getLieuArrivee() {
        return $this->lieuArrivee;
    }

    public function setLieuArrivee(Destination $lieuArrivee) {
        $this->lieuArrivee = $lieuArrivee;
    }

    public function getDateDepart() {
        return $this->dateDepart;
    }

    public function setDateDepart($dateDepart) {
        $this->dateDepart = $dateDepart;
    }

    public function getHeureDepart() {
        return $this->heureDepart;
    }

    public function setHeureDepart($heureDepart) {
        $this->heureDepart = $heureDepart;
    }

    public function getDateArrivee() {
        return $this->dateArrivee;
    }

    public function setDateArrivee($dateArrivee) {
        $this->dateArrivee = $dateArrivee;
    }

    public function getHeureArrivee() {
        return $this->HeureArrivee;
    }

    public function setHeureArrivee($HeureArrivee) {
        $this->HeureArrivee = $HeureArrivee;
    }

    public function getDureeTrajet() {
        return $this->DureeTrajet;
    }

    public function setDureeTrajet($DureeTrajet) {
        $this->DureeTrajet = $DureeTrajet;
    }

}
?>
