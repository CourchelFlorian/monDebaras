<?php

class Profil 
{
	private $id;
	private $intitule;
	
        function getId ()//accesseur de l'id des profil
        {
            return $this->id;
        }

        function getIntitule()//accesseur de l'intitulé de profil
        {
            return $this->intitule;
        }


        function lireInfosProfil($id)//fonction qui renvoie les info du profil dont l'id est passé en parametre
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("SELECT intitule
                                      FROM profil
                                      WHERE id = :id");

            $requete->bindValue(':id', $id);
		
            try
            {
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne['intitule'];
            }
        
            catch (Exception $e)
            {
                echo 'erreur. Impossible de récupérer l\'intitulé'.$e;
                return false;
            }   
        }
	
	
	



        function ajouterProfil($intitule) //fonction permettant l'ajout d'un profil dans la bdd
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("INSERT INTO profil
                                      Values(null,:intitule)");
            
            $requete->bindValue(':intitule', $intitule);
	
	
            try
            {
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
            }
            catch (Exception $e)
            {
                echo 'erreur. Impossible d\'ajouter l\'intitulé'.$e;
                return false;
            }   
        }



        function modifierProfil($intitule,$id) //fonction permettant la modification de l'intitulé du profil
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("UPDATE profil SET
                                      intitule=:intitule
                                      WHERE idProfil=:id");

            $requete->bindValue(':intitule', $intitule);
	
            $requete->bindValue(':id', $id);

            try
            {
                $requete->execute();              
            }
            catch (Exception $e)
            {
                    echo 'erreur. Impossible de modifier l\'intitulé'.$e;                   
            }   
        }

        function supprimerProfil($id)//fonction permettant la suppression d'un profil
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("DELETE FROM profil 
                                      WHERE id=:id");

	
            $requete->bindValue(':id', $id);

            try
            {
                $requete->execute();                
            }
            
            catch (Exception $e)
            {
                echo 'erreur. Impossible de supprimer l\'intitulé'.$e;                    
            }   
        }



        function chargerProfil()//fonction permettant du charger un profil
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("SELECT id,intitule
                                      FROM profil");
	
            $requete->execute();
        
        
            try
            {
                $requete->execute();
                $tab = $requete->fetchAll();
                $requete->closeCursor();
                return $tab;
            }
            catch (Exception $e)
            {
                echo 'erreur. Impossible de récupérer les profils'.$e;
                return false;
            }   	
        }
}