<nav> <!-- détermine une section dans laquelle sont regroupés des liens de navigation vers d'autres pages. -->
    <div class="textMenu"> <a href="#"> Accueil </a> </div> <!-- Un bloc avec le lien vers l'accueil -->
        <div class="bordure"></div>
    <?php include 'vueElementMenuChercherObjet.php'; ?> <!-- On inclut la page vueElementMenuChercherObjet.php -->
        <div class="bordure"></div>
     <div class="textMenu"> Identifiez-vous :</div> <!-- Un bloc avec un formulaire pour s'identifier -->
        <form action="index.php?useCase=gererConnexion&action=valideConnexion" method="post">
            <input type="text" name="user" placeholder="Identifiant"/> <br />
            <input type="password" name="mdp" placeholder="Mot de passe"/> <br />
            <input type="submit"value="Connexion"/>
        </form>
     </div>
</nav>