<nav>
    <div class="textMenu"> <a href="#"> Accueil </a> </div>
        <div class="bordure"></div>
    <?php include 'vueElementMenuChercherObjet.php'; ?>
        <div class="bordure"></div>
     <div class="textMenu"> Identifiez-vous :</div>
        <form action="index.php?useCase=gererConnexion&action=valideConnexion" method="post">
            <input type="text" name="user" placeholder="Identifiant"/> <br />
            <input type="password" name="mdp" placeholder="Mot de passe"/> <br />
            <input type="submit"value="Connexion"/>
        </form>
     </div>
</nav>