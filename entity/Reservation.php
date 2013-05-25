<?php
namespace entity;

use entity\Client;

class Reservation{
    private $numReservation;
    private $date;
    private $client;
    
    function __construct($numReservation, $date, Client $client) {
        $this->numReservation = $numReservation;
        $this->date = $date;
        $this->client = $client;
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

}
?>
