<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise a Jour achat</title>
</head>
<body>
<fieldset>
        <legend>Modifier Un achat</legend>
            <form action="../controlleur/achatServeur.php?action=modifier" method="post">
            <label for="id_clients">Id client</label>
            <input type="number" name="id_clients" value=""><br><br>
            <label for="id_articles">Id article</label>
            <input type="number" name="id_articles" value=""><br><br>
            <label for="quantite">Quantite</label>
            <input type="number" name="quantite" value=""><br><br>
            <label for="date">Date</label>
            <input type="date" name="date" value=""><br><br>
            <input type = "submit" name = bt_submit value="Modifier">
            </form>
            
        </fieldset>
</body>
</html>