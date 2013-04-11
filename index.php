<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>

    <body>
           <?php
    session_start();
    include "global/config.php";
    include "vues/vueHeader.php";
    
    
    if (!isset($_REQUEST['useCase']))
    {     
        $_REQUEST['useCase'] = 'gererConnexion'; 
    }
    
    $useCase = $_REQUEST['useCase'];
    switch ($useCase){
        case 'gererConnexion':{
            include "controleurs/controleurConnexion.php";
            break;
            }
        case 'gererObjets':{
            include "controleurs/controleurObjet.php";
            break;
        }
    }
    

   

    include "vues/vueFooter.php";

    ?>
    </body>
</html>