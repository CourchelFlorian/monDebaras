<?php

class Membre
{
    private $id;
    private $login;
    private $mdp;    
    private $droit;
    private $mail;
	
function getId () 
{
	return $this->id;
}

function getLogin() 
{
        return $this->login;
}

function getMdp() 
{
        return $this->mdp;
}

function getDroit() 
{
        return $this->droit;
}

function getMail() 
{
        return $this->mail;
}

function lireInfosMembre($id) 
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
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer les infos'.$e;
                    return false;
        }   
}
	
function ajouterMembre($intitule) // Ajouter membre
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO membre Values( :id
                                                             :login
                                                             :mdp
                                                             :droit
                                                             :mail                                                           
                                    )");
        
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
        catch (Exception $e){
                    echo 'erreur. Impossible d\'ajouter le membre'.$e;
                    return false;
        }   
}



function modifierDroit($id) // Modifier droit
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE membre SET 
                                                droit
                                                where idProfil=:id");
	
        $requete->bindValue(':id', $id);

	try
        {
                $requete->execute();
               
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de modifier le droit'.$e;
                   
        }   
}

function supprimerMembre($id) // Supprimer membre
{

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE FROM membre 
                                  where id=:id");

	
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
