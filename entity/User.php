<?php
namespace entity;

class User{
    private $id;
    private $statut;
    private $login;
    private $password;
    private $droits;
    
    function __construct($id, $statut, $login, $password, $droits) {
        $this->id = $id;
        $this->statut = $statut;
        $this->login = $login;
        $this->password = $password;
        $this->droits = $droits;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
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

    public function getDroits() {
        return $this->droits;
    }

    public function setDroits($droits) {
        $this->droits = $droits;
    }

	public static function isAdminConnected() {
		return (isset($_SESSION['login_admin']) && strlen($_SESSION['login_admin']) > 0);
	}

}
?>
