<?php
namespace controller;

use dao\MysqlDao;

class PropositionsController{  
    public function action(){
        
        $messages = array();
        
        // on verifie si on a bien recuperer la ville de depart saisie par l'utilisateur
        
         if(!isset($_POST['villedepart']) || strlen($_POST['villedepart'])==0){
            $messages[]="Veuillez indiquer la ville de départ";
            $villedepart = NULL;                   
        }else{
            $villedepart= $_POST['villedepart'];            
        }
        if(isset($villedepart) && strlen($villedepart)!= 0){
            $dao = new MysqlDao();
            $depart = $dao->getPropositionsByVol($villedep, $villearrivee, $datedep);}
       
}
}


?>
