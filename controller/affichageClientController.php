<?php
namespace controller;

use dao\MysqlDao;

class affichageClientController{
    public function action(){
        $message = null;
        // On vérifie qu'un numéro de client a été saisi :
        if(isset($_POST['numclient']) && strlen($_POST['numclient']) != 0){
            $dao = new MysqlDao();
            $client = $dao->getInfosClientById($_POST['numclient']);
            if($client->getId() == null){
                // Cas d'un identifiant non valide (= le client n'existe pas en base) :
                $message = 'Le client N°'. htmlentities($_POST['numclient'], ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
            }
        }else {
            // Cas du champ laissé vide :
            $message = 'Vous devez saisir l\'identifiant d\'un client pour
                    obtenir sa description !';
        }
        include VIEW."displayClient.php";
    }    
    
}
?>
