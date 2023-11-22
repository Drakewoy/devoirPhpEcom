<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page">
        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red; font-size: 29px;'> Utilisateur : " . $_SESSION['error_message'] . "</p>";
        } ?>
        <h1>Enregistrer Un Client</h1>
        <form action="../controlleur/clientServeur.php?" method="post">
            <input type="hidden" name="action" value="enregistrer">
            <label for="nom">Nom</label>
            <input type="text" name="nom">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom">
            <label for="adresse">Adresse</label>
            <textarea name="adresse" id="adresse" cols="30" rows="10"></textarea>
            <label for="codepostal">Code postal</label>
            <input type="text" name="codepostal">
            <label for="ville">Ville</label>
            <input type="text" name="ville">
            <label for="pays">Pays</label>
            <input type="text" name="pays">
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone">
            <input type="submit" value="Enregistrer">
        </form>

    </div>
</body>

</html>