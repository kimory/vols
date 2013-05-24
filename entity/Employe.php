<?php
namespace entity;

use entity\Personne;

final class Client extends Employe{
    private $fonction;
    
    public function __construct($id, $civilite, $nom, $prenom, $adresse, $cp, $ville, $pays, $fonction) {
        parent::__construct($id, $civilite, $nom, $prenom, $adresse, $cp, $ville, $pays);
        $this->$fonction = $fonction;
    }
    
    public function getFonction() {
        return $this->fonction;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }



}
?>
