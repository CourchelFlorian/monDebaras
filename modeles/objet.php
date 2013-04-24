<?php

class objet 
{
	private $id;
	private $idCategorie;
        private $idVendeur;
        private $prix;
        private $prixSeuil;
        private $tempsRestant;
        
        function getIdObjet ()
        {
            return $this->id;
        }
        
        function getIdCategorie ()
        {
            return $this->idCategorie;
        }
        
        function getIdVendeur ()
        {
            return $this->idVendeur;
        }
        
        function getPrix ()
        {
            return $this->prix;
        }
        
        function getPrixSeuil ()
        {
            return $this->prixSeuil;
        }
        
        function getTempsRestant()
        {
            return $this->tempsRestant;
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
                return $ligne['id,idCategorie,idVendeur,prix,prixSeuil,tempsRestant']; // Je suis pas sûr non plus de cette ligne
            }
            catch (Exception $e)
            {
                echo 'erreur. Impossible de récupérer les infos'.$e;
                return false;
            }   
        }
        
        function ajouterObjet($id, $idCategorie, $idVendeur, $prix, $prixSeuil, $tempsRestant) 
        {

            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("INSERT INTO objet
                                      Values( :id
                                              :idCategorie
                                              :idVendeur
                                              :prix
                                              :prixSeuil
                                              :tempsRestant)");
        
            $requete->bindValue(':id', $id); 
            $requete->bindValue(':idCategorie', $idCategorie);
            $requete->bindValue(':idVendeur', $idVendeur);
            $requete->bindValue(':prix', $prix);
            $requete->bindValue(':prixSeuil', $prixSeuil);
            $requete->bindValue(':tempsRestant', $tempsRestant);
	
	
        try
        {            
            $requete->execute() ;
            $dernierId = $pdo->lastInsertId();
            return $dernierId;
        }
        catch (Exception $e)
        {            
            echo 'erreur. Impossible d\'ajouter l\'objet'.$e;
            return false;
        }
        }
        
        function modifierObjet($id, $idCategorie, $idVendeur, $prix, $prixSeuil, $tempsRestant)
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("UPDATE objet
                                      SET idCategorie=:idCategorie
                                          idVendeur=:idVendeur
                                          prix=:prix
                                          prixSeuil=:prixSeuil
                                          tempsRestant=:tempsRestant)
                                      WHERE idProfil=:id");

            $requete->bindValue(':id', $id); 
            $requete->bindValue(':idCategorie', $idCategorie);
            $requete->bindValue(':idVendeur', $idVendeur);
            $requete->bindValue(':prix', $prix);
            $requete->bindValue(':prixSeuil', $prixSeuil);
            $requete->bindValue(':tempsRestant', $tempsRestant);

            try
            {
                $requete->execute();               
            }
            catch (Exception $e)
            {
                echo 'erreur. Impossible de modifier l\'objet'.$e;                   
            }   
        }
        
        function supprimerObjet($id)
        {
            $pdo = PDO2::getInstance();

            $requete = $pdo->prepare("DELETE FROM objet 
                                      WHERE id=:id");

	
            $requete->bindValue(':id', $id);

            try
            {
                $requete->execute();                
            }
            catch (Exception $e)
            {
                echo 'erreur. Impossible de supprimer l\'objet'.$e;                    
            }   
        }
        
}
?>
