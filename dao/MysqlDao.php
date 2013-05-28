<?php

namespace dao;

use \PDO;

class MysqlDao {

    private $dbh;

    public function __construct() {
        // Connexion à la BD. Les options permettent de renvoyer une exception
        // + d'afficher correctement en UTF8 :
        $attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $attributes);
    }
}
?>
