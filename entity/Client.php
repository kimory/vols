<?php
namespace entity;

use entity\Personne;

final class Client extends Personne{
    private $mail;
    private $telFixe;
    private $telPortable;
    private $login;
    private $password;
    
    public function __construct($id, $civilite, $nom, $prenom, $adresse, $cp, $ville, $pays, $mail, $telFixe, $telPortable, $login, $password) {
        parent::__construct($id, $civilite, $nom, $prenom, $adresse, $cp, $ville, $pays);
        $this->mail = $mail;
        $this->telFixe = $telFixe;
        $this->telPortable = $telPortable;
        $this->login = $login;
        $this->password = $password;
    }
    
    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getTelFixe() {
        return $this->telFixe;
    }

    public function setTelFixe($telFixe) {
        $this->telFixe = $telFixe;
    }

    public function getTelPortable() {
        return $this->telPortable;
    }

    public function setTelPortable($telPortable) {
        $this->telPortable = $telPortable;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
?>
