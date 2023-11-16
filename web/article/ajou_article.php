<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enregistrer Article</title>
</head>

<body>
    <fieldset>

        <legend>Ajouter Un Article</legend>
        <form action="../controlleur/articleServeur.php" method="post">
            <input type="hidden" name="action" value="enregistrer">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom"><br><br>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix" >
            <!-- button -->
            <input type="submit" value="enregistrer">
        </form>
    </fieldset>
</body>

</html>