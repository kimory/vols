<?php
namespace entity;

use entity\Destination;

class Vol{
    const NB_PLACES = 170;
    private $numvol;
    private $lieuDepart;
    private $lieuArrivee;
    private $dateHeureDepart;   
    private $dateHeureArrivee;    
    private $tarif;
    private $pilote;
    private $copilote;
    private $hotesse_steward1;
    private $hotesse_steward2;
    private $hotesse_steward3;
    private $nb_places_restantes;
    
    function __construct($numvol, $lieuDepart, $lieuArrivee, $dateHeureDepart, $dateHeureArrivee, $tarif,
                    $pilote, $copilote, $hotesse_steward1, $hotesse_steward2, $hotesse_steward3, $nb_places_restantes) {
        $this->numvol = $numvol;
        $this->lieuDepart = $lieuDepart;
        $this->lieuArrivee = $lieuArrivee;
        $this->dateHeureDepart = $dateHeureDepart;        
        $this->dateHeureArrivee = $dateHeureArrivee;       
        $this->tarif = $tarif;
        $this->pilote = $pilote;
        $this->copilote = $copilote;
        $this->hotesse_steward1 = $hotesse_steward1;
        $this->hotesse_steward2 = $hotesse_steward2;
        $this->hotesse_steward3 = $hotesse_steward3;
        $this->nb_places_restantes = $nb_places_restantes;
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
    
    public function getPilote() {
        return $this->pilote;
    }

    public function setPilote($pilote) {
        $this->pilote = $pilote;
    }

    public function getCopilote() {
        return $this->copilote;
    }

    public function setCopilote($copilote) {
        $this->copilote = $copilote;
    }

    public function getHotesse_steward1() {
        return $this->hotesse_steward1;
    }

    public function setHotesse_steward1($hotesse_steward1) {
        $this->hotesse_steward1 = $hotesse_steward1;
    }

    public function getHotesse_steward2() {
        return $this->hotesse_steward2;
    }

    public function setHotesse_steward2($hotesse_steward2) {
        $this->hotesse_steward2 = $hotesse_steward2;
    }

    public function getHotesse_steward3() {
        return $this->hotesse_steward3;
    }

    public function setHotesse_steward3($hotesse_steward3) {
        $this->hotesse_steward3 = $hotesse_steward3;
    }
    
    public function getNb_places_restantes() {
        return $this->nb_places_restantes;
    }

    public function setNb_places_restantes($nb_places_restantes) {
        $this->nb_places_restantes = $nb_places_restantes;
    }
    
}
?>
