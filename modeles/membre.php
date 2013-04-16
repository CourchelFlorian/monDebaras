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
                return $ligne['id,login,mdp,droit,mail'];
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer les infos'.$e;
                    return false;
        }   
}
	
function ajouterMembre($intitule) // Ajouter memebre
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO profil Values(
                                                            null,
                                                            :intitule
                                    )");
	$requete->bindValue(':intitule', $intitule);
	
	
        try{
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible d\'ajouter l\'intitulé'.$e;
                    return false;
        }   
}



function modifier_profil_dans_bdd($intitule,$id) // Modifier droit
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE profil SET
                                    		intitule=:intitule
                                		where idProfil=:id");

	$requete->bindValue(':intitule', $intitule);
	
        $requete->bindValue(':id', $id);

	try{
                $requete->execute();
               
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de modifier l\'intitulé'.$e;
                   
        }   
}

function supprimer_profil_dans_bdd($id) // Supprimer membre
{

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE FROM profil 
                                  where id=:id");

	
        $requete->bindValue(':id', $id);

	try{
                $requete->execute();
                
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de supprimer l\'intitulé'.$e;
                    
        }   
}



function chargerprofil() {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT id,intitule FROM profil");
	
	$requete->execute();
        
        
        try{
                $requete->execute();
                $tab = $requete->fetchAll();
		$requete->closeCursor();
                return $tab;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer les profils'.$e;
                    return false;
        }   
	
}
}
