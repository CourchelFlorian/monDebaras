<?php

class categorie 
{
	private $id;
	private $libelle;
	
    function getId () //fonction recuperant l'id de la categorie
    {
            return $this->id;
    }

    function getLibelle() //fonction de recuperant le libelle
    {
            return $this->libelle;
    }
    
    function lireInfosCategorie($id) //fonction retournant le libelle de la categorie liée a l'id fourni en parametre
    {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT libelle
                                  FROM categorie
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
	
	
	try
        {
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne['libelle'];
        }
        catch (Exception $e)
        {
                    echo 'erreur. Impossible de récupérer le libelle'.$e;
                    return false;
        }   
    }
    
    function ajouterCategorie($intitule) //fonction permettant d'ajouter une categorie
    {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO categorie 
                                  Values(null,:libelle)");
        
	$requete->bindValue(':libelle', $intitule);
	
	
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


    function modifierCategorie($libelle,$id)//fonction modifiant le libelle de la categorie désignée
    {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE categorie 
                                  SET (libelle=:libelle)
                                  where id=:id");

	$requete->bindValue(':libelle', $libelle);
	
        $requete->bindValue(':id', $id);

	try
        {
                $requete->execute();
               
        }
        catch (Exception $e)
        {
                    echo 'erreur. Impossible de modifier le libelle'.$e;
                   
        }   
    }
}

