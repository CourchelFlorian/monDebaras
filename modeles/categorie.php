<?php

class categorie 
{
	private $id;
	private $libelle;
	
    function getId () 
    {
            return $this->id;
    }

    function getLibelle() 
    {
            return $this->libelle;
    }
    
    function lireInfosCategorie($id) 
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
    
    function ajouterCategorie($intitule) 
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



    function modifierCategorie($libelle,$id)
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

