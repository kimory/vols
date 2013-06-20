<?php
include '../setup.php';

// simple test, ne respecte pas l'architecture de l'appli

function test($login, $password){
    $attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $attributes);
    $sql = "INSERT INTO user (login,password) VALUES (:login,:password)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array("login" => $login, "password" => crypt($password)));
}

//test('tux', 'tux');
//echo "". crypt('tux');
//if (strcmp(crypt('tux'),'$6$iqYnWUqzIQEs$Mxy4QhB4OdPPJHsGrluOOZlOSflK4JNUVPqhkf1qKQN8gTb6X7mJpn./p0x//8FQyH7TlwmO3if4yaj3ewx8') == 0) {
//   echo "Mot de passe correct !";
//}

$salt = '$5$ABCDEFGHIJKLM'; // $5$ indique que c'est du sha256
$hashed_password = crypt('tux', $salt);
echo "". crypt('general', $salt). "\n";
echo "". crypt('tux', $salt). "\n";
        
if (crypt('tux', $salt) == $hashed_password) {
   echo "Mot de passe correct !";
}


?>