<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_achats.php">
    <title>Document</title>
</head>
   
<body>
<button onclick="window.location.href = 'index.php';"><P>Accueil</P></button>
    <hr>
    <fieldset>
    <legend>Ajout achats</legend>
        <form action="liste_clients.php" method="post">
        <label for="id_achats">id_achat</label>
        <input type="number" name="id_achats"/><br><br>
        <label for="id_clients">id_client</label>
        <input type="number" name="id_clients"/><br><br>
        <label for="id_articles">id_article</label>
        <input type="number" name="id_articles"/><br><br>
        <label for="quantite">quantite</label>
        <input type="number" name="quantite"/><br><br>
        <label for="date">date</label>
        <input type="date" name="date"/><br><br>
        <input type = "submit" name = bt_submit value="Enregistrer" />
        </form>
        
    </fieldset>
   
</body>
</html>