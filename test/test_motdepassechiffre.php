<?php
include '../setup.php';

function test($login, $password){
    $attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $attributes);
    $sql = "INSERT INTO user (login,password) VALUES (:login,:password)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array("login" => $login, "password" => crypt($password)));
}

//test('tux', 'tux');

if (crypt('tux') == '$1$3Z0.OW2.$Mg6ScudaEbP8OfSDoGyNI/') {
   echo "Mot de passe correct !";
}
?>