<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Un Client</title>
</head>
<fieldset>
    <legend>Moidifier Un Client</legend>
    <form action="../controlleur/clientServeur.php?action=modifier" method="post">
        <label for="id_client">Id Client</label>
        <input type="text" name="id_client" value=""><br><br>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value=""><br><br>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" value=""><br><br>
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse" cols="30" rows="10" value=""></textarea><br><br>
        <label for="codepostal">Code postal</label>
        <input type="text" name="codepostal" value=""><br><br>
        <label for="ville">Ville</label>
        <input type="text" name="ville" value=""><br><br>
        <label for="pays">Pays</label>
        <input type="text" name="pays" value=""><br><br>
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone" value=""><br><br>
        <input type="submit" value="Modifier">
    </form>

</fieldset>
</body>

</html>