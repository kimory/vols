<?php
namespace entity;

use entity\Client;

class Reservation{
    private $numReservation;
    private $date;
    private $client;
    private $vol;
    private $nbpassagers;
    private $dateDuVol;
    
    function __construct($numReservation, $date, Client $client, Vol $vol, $nbpassagers, $dateDuVol = null) {
        $this->numReservation = $numReservation;
        $this->date = $date;
        $this->client = $client;
        $this->vol = $vol;
        $this->nbpassagers = $nbpassagers;
        $this->dateDuVol = $dateDuVol;
    }

    public function getNumReservation() {
        return $this->numReservation;
    }

    public function setNumReservation($numReservation) {
        $this->numReservation = $numReservation;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getClient() {
        return $this->client;
    }

    public function setClient(Client $client) {
        $this->client = $client;
    }

    public function getVol() {
        return $this->vol;
    }

    public function setVol(Vol $vol) {
        $this->vol = $vol;
    }

    public function getNbpassagers() {
        return $this->nbpassagers;
    }

    public function setNbpassagers($nbpassagers) {
        $this->nbpassagers = $nbpassagers;
    }
    
    public function getDateDuVol() {
        return $this->dateDuVol;
    }

    public function setDateduvol($dateDuVol) {
        $this->dateDuVol = $dateDuVol;
    }
}
?>
