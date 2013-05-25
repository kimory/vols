<?php
namespace entity;

use entity\Vol;
use entity\Employe;

class Travailler{
    private $vol;
    private $pilote;
    private $copilote;
    private $hotesseSteward1;
    private $hotesseSteward2;
    private $hotesseSteward3;
    private $date;
    
    function __construct(Vol $vol, Employe $pilote, Employe $copilote, Employe $hotesseSteward1, Employe $hotesseSteward2, Employe $hotesseSteward3, $date) {
        $this->vol = $vol;
        $this->pilote = $pilote;
        $this->copilote = $copilote;
        $this->hotesseSteward1 = $hotesseSteward1;
        $this->hotesseSteward2 = $hotesseSteward2;
        $this->hotesseSteward3 = $hotesseSteward3;
        $this->date = $date;
    }
    
    public function getVol() {
        return $this->vol;
    }

    public function setVol(Vol $vol) {
        $this->vol = $vol;
    }

    public function getPilote() {
        return $this->pilote;
    }

    public function setPilote(Employe $pilote) {
        $this->pilote = $pilote;
    }

    public function getCopilote() {
        return $this->copilote;
    }

    public function setCopilote(Employe $copilote) {
        $this->copilote = $copilote;
    }

    public function getHotesseSteward1() {
        return $this->hotesseSteward1;
    }

    public function setHotesseSteward1(Employe $hotesseSteward1) {
        $this->hotesseSteward1 = $hotesseSteward1;
    }

    public function getHotesseSteward2() {
        return $this->hotesseSteward2;
    }

    public function setHotesseSteward2(Employe $hotesseSteward2) {
        $this->hotesseSteward2 = $hotesseSteward2;
    }

    public function getHotesseSteward3() {
        return $this->hotesseSteward3;
    }

    public function setHotesseSteward3(Employe $hotesseSteward3) {
        $this->hotesseSteward3 = $hotesseSteward3;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }


}
?>
