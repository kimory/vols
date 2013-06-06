<?php
namespace controller;

use dao\MysqlDao;

class PropositionsController{  
    public function action(){
        $message = null;
        // on verifie si on a bien recuperer la ville de depart saisie par l'utilisateur
         if(isset($_POST['villedepart']) && strlen($_POST['villedepart'])!=0){
             if($_POST['villedepart'])
            $villedepart= $_POST['villedepart'];        
        }else{
            
        }
       
}
}

try{
$dao = new MysqlDao();
$selectByVol = $dao-> getSelectByVol();
include VIEW.'display_propositions.php';
}  catch (PDOException $ex){
    header("location:/vols/public/error.php");
}
?>
