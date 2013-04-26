<?php

class objet 
{
	private $id;
	private $idCategorie;
        private $idVendeur;
        private $prix;
        private $prixSeuil;
        private $tempsRestant;
        

        function getIdObjet ()//accesseur dde l'id des objet

        {
            return $this->id;
        }
        
        function getIdCategorie ()//accesseur de l'id categorie
        {
            return $this->idCategorie;
        }
        
        function getIdVendeur ()//accesseur de l'id vendeur
        {
            return $this->idVendeur;
        }
        
        function getPrix ()//accesseur des prix 
        {
            return $this->prix;
        }
        
        function getPrixSeuil ()//accesseur des prix seuil
        {
            return $this->prixSeuil;
        }
        
        function getTempsRestant()//accesseur du temps restant avant la fin de l'enchere
        {
            return $this->tempsRestant;
        }
        
        function lireInfosMembre($id) //fonction qui renvoie les info de l'objet dont l'id est passé en parametre
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
        
        function ajouterObjet($id, $idCategorie, $idVendeur, $prix, $prixSeuil, $tempsRestant) //fonction permettant l'ajout d'un objet dans la bdd
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
        
        function modifierObjet($id, $idCategorie, $idVendeur, $prix, $prixSeuil, $tempsRestant)//fonction permettant la modification des caractéristiques de l'objet
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
        
        function supprimerObjet($id)//fonction permettant la suppression d'un objet
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
