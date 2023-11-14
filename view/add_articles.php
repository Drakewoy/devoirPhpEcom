<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_articles.php">
    <title>Ajout articles</title>
</head>
<body>
<button onclick="window.location.href = 'index.php';"><P>Accueil</P></button>
    <hr>
    <fieldset>
    <legend>Ajout articles</legend>
        <form action="stock_articles.php" method="post">
        <label for="references">References</label>
        <input type="text" name="references"/><br><br>
        <label for="nom">Nom</label>
        <input type="text" name="nom"/><br><br>
        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
        <label for="prix">Prix</label>
        <input type="number" name="prix"/><br><br>
        <input type = "submit" name = bt_submit value="Enregistrer" />
        </form>
        
    </fieldset>
</body>
</html>