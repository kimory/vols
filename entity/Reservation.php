<?php
namespace entity;

use entity\Client;

class Reservation{
    private $numReservation;
    private $date;
    private $client;
    private $vol;
    private $passager;
    private $dateDuVol;
    
    function __construct($numReservation, $date, $client, $vol, $passager, $dateDuVol = null) {
        $this->numReservation = $numReservation;
        $this->date = $date;
        $this->client = $client;
        $this->vol = $vol;
        $this->passager = $passager;
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

    public function setClient($client) {
        $this->client = $client;
    }

    public function getVol() {
        return $this->vol;
    }

    public function setVol($vol) {
        $this->vol = $vol;
    }

    public function getPassager() {
        return $this->passager;
    }

    public function setPassager($passager) {
        $this->passager = $passager;
    }
    
    public function getDateDuVol() {
        return $this->dateDuVol;
    }

    public function setDateduvol($dateDuVol) {
        $this->dateDuVol = $dateDuVol;
    }
}
?>
