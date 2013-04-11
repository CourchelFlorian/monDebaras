

<div class="corps">
<form enctype="multipart/form-data" action="index.php?useCase=ajoutObjet&action=valideFormulaire" method="post">
    <fieldset>
        <legend>Ajouter un objet</legend>
        <table style="text-align: left;">
            <tr>
                <th> Intitule :</th>
                <th><input type="text" name="intitule" /></th>
            </tr>
            <tr>
                <th> Categorie :</th>
                <th>
                   <select name="categorie" >
                       <option value="...">...</option>
                   </select> <!-- Fonction Charger_categorie à revoir pour affichage auto-->
                </th>
            </tr>
            <tr>
                <th>Description :</th>
                <th><textarea> </textarea></th>
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
    </fieldset>
</form>
</div>