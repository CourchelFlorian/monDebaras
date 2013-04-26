<?php

require_once 'global/config.php';

require_once CHEMIN_LIB.'pdo2.php';

require_once CHEMIN_MODELE.'membre.php';

function resultatTest($attendu, $obtenu)
{
    $resultat="échec";
    if ($attendu == $obtenu)
    {
        $resultat ="réussite";
    }
    return $resultat;
}

$membre = new membre();

//test de lireInfoMembre

$id=1;
$attendu = "Florian, guy, 1, test@gmail.com";

echo 'récupère l\'intitulé du membre numéro '.$id;

echo 'profil attendu : '.$attendu.' / profil récupéré : ';
$obtenu = $membre->lireInfosMembre($id);
echo $obtenu.' '. resultatTest($attendu, $obtenu).'<br/>';

$id=2;
$attendu = "debarrasseur, guy, 2, test@gmail.com";

echo 'récupère l\'intitulé du membre numéro '.$id;

echo 'profil attendu : '.$attendu.' / profil récupéré : ';
$obtenu = $membre->lireInfosMembre($id);
echo $obtenu.' '. resultatTest($attendu, $obtenu).'<br/>';

//fin de test lireInfoMembre

//test de modifier membre

?>
