<?php
namespace entity;

class Destination{
    private $codeAeroport;
    private $pays;
    private $ville;
    
    function __construct($codeAeroport, $pays, $ville) {
        $this->codeAeroport = $codeAeroport;
        $this->pays = $pays;
        $this->ville = $ville;
    }

    public function getCodeAeroport() {
        return $this->codeAeroport;
    }

    public function setCodeAeroport($codeAeroport) {
        $this->codeAeroport = $codeAeroport;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }


}
?>
