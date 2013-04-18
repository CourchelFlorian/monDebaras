

<div class="corps">
<form enctype="multipart/form-data" action="index.php?useCase=ajoutObjet&action=valideFormulaire" method="post">
    <fieldset> <!-- Groupe différente partie d'un formulaire -->
        <legend>Ajouter un objet</legend> <!-- Définit la légende du groupe -->
        <table style="text-align: left;"> <!-- Création d'un tableau -->
            <tr>
                <th> Intitule :</th>
                <th><input type="text" name="intitule" /></th>
            </tr>
            <tr>
                <th> Categorie :</th>
                <th>
                   <select name="categorie" > <!-- Créaion d'un menu déroulant -->
                       <option value="...">...</option>
                   </select> <!-- Fonction Charger_categorie à revoir pour affichage auto-->
                </th>
            </tr>
            <tr>
                <th>Description :</th>
                <th><textarea> </textarea> <!-- Zone de texte style textBox --></th>
            </tr>
            <tr>
                <th>Prix :</th>
                <th><input type="text" name="prix" /></th>
            </tr>
            <tr>
                <th>Illustration :</th>
                <th><input type="hidden" name="MAX_FILE_SIZE" value="100000" />  <input name="userfile" type="file" /></th>
            </tr>
        </table>
          <input type="button" value="Ajouter"/>
    </fieldset> <!-- Fin du Groupe -->
</form>
</div>