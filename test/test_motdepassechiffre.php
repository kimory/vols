<?php
// simple test, sur le chiffrement de mot de passe

$salt = '$5$ABCDEFGHIJKLM'; // $5$ indique que c'est du sha256
$hashed_password = crypt('tux', $salt);
echo crypt('tux', $salt). PHP_EOL;
echo crypt('autrechaine', $salt) . PHP_EOL;
        
if (crypt('tux', $salt) == $hashed_password) {
   echo "Mot de passe correct !";
}

?>