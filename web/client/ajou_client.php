<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer Un Client</title>
</head>
<fieldset>
    <legend>Enregistrer Un Client</legend>
    <form action="../controlleur/clientServeur.php?" method="post">
        <input type="hidden" name="action" value="enregistrer">
        <label for="numero">No_client</label>
        <input type="text" name="numero"><br><br>
        <label for="nom">Nom</label>
        <input type="text" name="nom"><br><br>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom"><br><br>
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse" cols="30" rows="10"></textarea><br><br>
        <label for="codepostal">Code postal</label>
        <input type="text" name="codepostal"><br><br>
        <label for="ville">Ville</label>
        <input type="text" name="ville"><br><br>
        <label for="pays">Pays</label>
        <input type="text" name="pays"><br><br>
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone"><br><br>
        <input type="submit" value="Enregistrer">
    </form>

</fieldset>
</body>

</html>