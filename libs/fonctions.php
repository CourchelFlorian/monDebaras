<?php

function estConnecte ()
{
    return(isset($_SESSION['id']));
}

function connecte($id, $nom, $profil)
{
    $_SESSION['id']=$id;
    $_SESSION['nom']=$nom;
    $_SESSION['profil']=$profil;
}

function deconnecter()
{
    session_unset();
}

?>
