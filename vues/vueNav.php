<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <!-- Fournit les métadonnées de la page -->
<LINK rel="stylesheet" type="text/css" href="../styles/nav.css"/> <!-- Appel la page nav.css pour le style -->

<nav> <!-- détermine une section dans laquelle sont regroupés des liens de navigation vers d'autres pages. -->
 <?php
    if ($_SESSION['profil'] == 'admin') // Si c'est l'admin on ouvre la page vueElementMenuAdmin.php
    {
        include 'vueElementMenuAdmin.php'; 
    }
    else // Snon on ouvre le menu du membre
    {
        include 'vueElementMenuMembre.php';
    }
 
 ?>
</nav>

