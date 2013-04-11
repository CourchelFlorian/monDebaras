<?php

if (!isset($_REQUEST['action']))
{
    $_REQUEST['action'] = 'ajoutObjet';
}

$action=$_REQUEST['action'];

switch ($action)
{
    case 'ajoutObjet';
        {
        include 'vues/vueNav.php';
        include 'vues/vueAjoutObjets.php';
        
        break;
        }       
}

?>
