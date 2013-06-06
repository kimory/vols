<?php
namespace controller;

use dao\MysqlDao;

class PropositionsController{  
    public function action(){
        $messages = array();
        // on verifie si on a bien recuperer la ville de depart saisie par l'utilisateur
         if(isset($_POST['villedepart']) && strlen($_POST['villedepart'])!=0){
             if($_POST['villedepart'])
            $villedepart= $_POST['villedepart'];        
        }else{
            
            
        }
       
}
}


?>
