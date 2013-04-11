<?php

class Profil {
	private $id;
	private $intitule;
	
function getId () {
	return $this->id;
}

function getIntitule() {
        return $this->intitule;
}


function lire_infos_profil($id) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT intitule
                                  FROM profil
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne['intitule'];
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer l\'intitulé'.$e;
                    return false;
        }   
}
	
	
	



function ajouter_profil_dans_bdd($intitule) {

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



function modifier_profil_dans_bdd($intitule,$id) {

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

function supprimer_profil_dans_bdd($id) {

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