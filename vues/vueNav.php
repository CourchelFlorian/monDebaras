<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK rel="stylesheet" type="text/css" href="../styles/nav.css"/>

<nav>
 <?php
    if ($_SESSION['profil'] == 'admin')
    {
        include 'vueElementMenuAdmin.php';
    }
    else
    {
        include 'vueElementMenuMembre.php';
    }
 
 ?>
</nav>

