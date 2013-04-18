<?php


require_once 'global/config.php';

require_once CHEMIN_LIB.'pdo2.php'; 

require_once CHEMIN_MODELE.'profil.php';

function resultatTest($attendu, $obtenu){
    $resultat="échec";
    if ($attendu == $obtenu)
        $resultat ="réussite";
    return $resultat;
}

$categorie = new categorie();

/*
 * TEST DE LA METHODE lireInfosCategorie
 */

$id=1;
$attendu = "Voitures";

echo 'récupère le libelle de l\'id numéro '.$id;

echo 'libelle attendu : '.$attendu.' / libelle récupéré : ';
$obtenu = $Profil->lire_infos_profil($id);
echo $obtenu.' '. resultatTest($attendu, $obtenu).'<br/>';

$id=2;
$attendu = "Motos";

echo 'récupère le libelle de l\'id numéro '.$id;

echo 'libelle attendu : '.$attendu.' / libelle récupéré : ';
$obtenu = $Profil->lire_infos_profil($id);
echo $obtenu.' '. resultatTest($attendu, $obtenu).'<br/>';

//FIN TEST lireInfosCaegorie

/* $dernierProfil = $Profil->ajouter_profil_dans_bdd('root');
echo $Profil->lire_infos_profil($dernierProfil).'<br/>';

$Profil->modifier_profil_dans_bdd('admin',1);

echo $Profil->lire_infos_profil(1).'<br>';

$Profil->supprimer_profil_dans_bdd(3);
echo $Profil->lire_infos_profil(3).'<br/>';

$lesProfils = $Profil->chargerprofil();
foreach ($lesProfils as $unProfil)
{
    echo $unProfil['id'].' '.$unProfil['intitule'].'<br/>';
    
}


*/
?>
