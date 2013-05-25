<?php
namespace entity;

use entity\Passager;
use entity\Vol;
use entity\Reservation;

class Place{
    private $numPlace;
    private $prix;
    private $etat; // booléen : acheté ou non
    private $passager;
    private $vol;
    private $reservation;

    function __construct($numPlace, $prix, $etat, Passager $passager, Vol $vol, Reservation $reservation) {
        $this->numPlace = $numPlace;
        $this->prix = $prix;
        $this->etat = $etat;
        $this->passager = $passager;
        $this->vol = $vol;
        $this->reservation = $reservation;
    }

    public function getNumPlace() {
        return $this->numPlace;
    }

    public function setNumPlace($numPlace) {
        $this->numPlace = $numPlace;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function getPassager() {
        return $this->passager;
    }

    public function setPassager(Passager $passager) {
        $this->passager = $passager;
    }

    public function getVol() {
        return $this->vol;
    }

    public function setVol(Vol $vol) {
        $this->vol = $vol;
    }

    public function getReservation() {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation) {
        $this->reservation = $reservation;
    }  

}
?>
