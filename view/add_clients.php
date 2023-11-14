<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_clients.php">
    <title>Ajout clients</title>
</head>
<body>
<button onclick="window.location.href = 'index.php';"><P>Accueil</P></button>
    <hr>
    <fieldset>
    <legend>Ajout clients</legend>
        <form action="liste_clients.php" method="post">
        <label for="id">Numero</label>
        <input type="Number" name="id"/><br><br>
        <label for="nom">Nom</label>
        <input type="text" name="nom"/><br><br>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom"/><br><br>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse"/><br><br>
        <label for="codepostal">code postal</label>
        <input type="text" name="codepostal"/><br><br>
        <label for="ville">Ville</label>
        <input type="text" name="ville"/><br><br>
        <label for="pays">Pays</label>
        <input type="text" name="pays"/><br><br>
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone"/><br><br>
        <input type = "submit" name = bt_submit value="Enregistrer" />
        </form>
        
    </fieldset>
</body>
</html>