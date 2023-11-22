<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement D'achats</title>
</head>

<body>
    <div class="page">
        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<p style='color:red; font-size: 29px;'> Utilisateur : " . $_SESSION['error_message'] . "</p>";
        } ?>
        <div class="form">
            <form action="../controlleur/achatServeur.php" method="post">
                <input type="hidden" name="action" value="enregistrer">
                <label for="id_client">Id client</label>
                <input type="number" name="id_client"><br><br>
                <label for="id_article">Id article</label>
                <input type="number" name="id_article"><br><br>
                <label for="quantite">Quantite</label>
                <input type="number" name="quantite"><br><br>
                <label for="date">Date</label>
                <input type="date" name="date"><br><br>
                <input type="submit" value="Enregistrer">
            </form>
        </div>
    </div>
</body>

</html>