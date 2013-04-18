<nav> <!-- détermine une section dans laquelle sont regroupés des liens de navigation vers d'autres pages. -->
    <div class="textMenu"> <a href="#">Accueil </a> </div> <!-- Un bloc avec un lien vers l'acceuil -->
        <div class="bordure"></div>
     <?php include 'vueElementMenuChercherObjet.php'; ?> <!-- On inclut la page vueElementMenuChercherObjet.php -->
        <div class="bordure"></div>
      <div class="textMenu"> Consulter mes objets </div>
        <div class="bordure"></div>
     <div class="textMenu"> <a href="index.php?useCase=gererObjets&action=ajoutObjet">Ajouter un Objet</a> </div>
        <div class="bordure"></div>
     <div class="textMenu">  <a href="index.php?action=deconnexion">Deconnexion</a> </div>
 </nav>