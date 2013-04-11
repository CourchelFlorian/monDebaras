<?php

include 'modeles/profil.php';
include CHEMIN_LIB.'pdo2.php';
include CHEMIN_LIB.'fonctions.php';


if (!isset($_REQUEST['action']))
{
    $_REQUEST['action'] = 'demandeConnexion'; 
}
$action = $_REQUEST['action'];
switch ($action){
  
    case 'demandeConnexion':{
        include "vues/vueElementMenuConnexion.php";
        break;
    }
    
    case 'valideConnexion':{
        if (isset ($_REQUEST['user']) && isset($_REQUEST['mdp']))
        {    
            $user=$_REQUEST['user'];
            $mdp=$_REQUEST['mdp'];
            
            // si le membre existe, on le connecte
            // s'il a un profil administrateur, on appelle la vueElementMenuAdmin
            // s'il a un profil debarrasseur, on appelle le vueElementMenuMembre
          
            
         
            }
        }
        
        case 'deconnexion':{
            
            session_destroy();
            header("Location: index.php");
        }
        break;

}
?>
 