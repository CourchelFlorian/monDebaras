<?php

class Membre
{
    private $id;
    private $login;
    private $mdp;    
    private $droit;
    private $mail;
	
    function getId () //accesseur de l'id
    {
        return $this->id;
    }

    function getLogin() //accesseur du login
    {
        return $this->login;
    }

    function getMdp() //accesseur du mot de passe
    {
        return $this->mdp;
    }   

    function getDroit() //accesseur du droit
    {
        return $this->droit;
    }

    function getMail() //accesseur du mail
    {
        return $this->mail;
    }

    function lireInfosMembre($id) //fonction qui renvoie les info du membre correspondant a l'id
    {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT *
                                  FROM membre
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
	
	
	try
        {
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne['id,login,mdp,droit,mail']; // Je suis pas sûr de cette ligne
        }
        catch (Exception $e)
        {
                    echo 'erreur. Impossible de récupérer les infos'.$e;
                    return false;
        }   
    }
	

    function ajouterMembre($id) // Ajouter membre yo alex comme tu vois tu as des erreurs ligne 73, 74 etc.. je pense que c'est parce que tu as passé que l'id en parametre 
    //alors que pour ajouter un membre il faut lui donner un id certe mais aussi renseigner son mail son mdp et toussa bisou
    {  
	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO membre Values( :id,
                                                             :login,
                                                             :mdp,
                                                             :droit,
                                                             :mail)");
        
	$requete->bindValue(':id', $id); 
        $requete->bindValue(':login', $login);
        $requete->bindValue(':mdp', $mdp);
        $requete->bindValue(':droit', $droit);
        $requete->bindValue(':mail', $mail);
	
	
        try
        {
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
        }
        catch (Exception $e)
        {
                    echo 'erreur. Impossible d\'ajouter le membre'.$e;
                    return false;
        }   
    }



    function modifierDroit($id) // Modifier droit
    {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE membre 
                                  SET droit
                                  WHERE idProfil=:id");
	
        $requete->bindValue(':id', $id);

	try
        {
                $requete->execute();
               
        }
        catch (Exception $e)
        {
                    echo 'erreur. Impossible de modifier le droit'.$e;        
        }   
    }

    function supprimerMembre($id) // Supprimer membre
    {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE FROM membre 
                                  WHERE id=:id");

	
        $requete->bindValue(':id', $id);

	try
        {
                $requete->execute();
                
        }
        
        catch (Exception $e)
        {
                    echo 'erreur. Impossible de supprimer le membre'.$e;
                    
        }   
    }
}
