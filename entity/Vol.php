<?php
namespace entity;

use entity\Destination;

class Vol{
    private $numvol;
    private $lieuDepart;
    private $lieuArrivee;
    private $dateHeureDepart;   
    private $dateHeureArrivee;    
    private $tarif;
    
    function __construct($numvol, $lieuDepart, $lieuArrivee, $dateHeureDepart, $dateHeureArrivee, $tarif) {
        $this->numvol = $numvol;
        $this->lieuDepart = $lieuDepart;
        $this->lieuArrivee = $lieuArrivee;
        $this->dateHeureDepart = $dateHeureDepart;        
        $this->dateHeureArrivee = $dateHeureArrivee;       
        $this->tarif= $tarif;
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

    public function getDateHeureDepart() {
        return $this->dateHeureDepart;
    }

    public function setDateHeureDepart($dateHeureDepart) {
        $this->dateHeureDepart = $dateHeureDepart;
    }

    public function getDateHeureArrivee() {
        return $this->dateHeureArrivee;
    }

    public function setDateHeureArrivee($dateHeureArrivee) {
        $this->dateHeureArrivee = $dateHeureArrivee;
    } 

    public function getTarif() {
        return $this->tarif;
    }

    public function setTarif($tarif) {
        $this->tarif = $tarif;
    }

}
?>
