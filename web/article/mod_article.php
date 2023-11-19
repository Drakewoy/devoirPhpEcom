<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Article</title>
</head>

<body>
    <div class="page">
        <fieldset>

            <legend>Modifier Un Article</legend>
            <form action="../controlleur/articleServeur.php" method="post">
                <input type="hidden" name="action" value="modifier">
                <?php
                session_start();
                $reference;
                $nom;
                $description;
                $prix;
                if (isset($_SESSION['res_rechArt'])) {
                    $reference = $_SESSION['res_rechArt']['reference'];
                    $nom = $_SESSION['res_rechArt']['nom'];
                    $description = $_SESSION['res_rechArt']['description'];
                    $prix = $_SESSION['res_rechArt']['prix'];
                }

                echo '<label for="nom">reference</label>';
                echo "<input type='number' disabled name='id_article' value='{$reference}'><br><br>";
                echo '<label for="nom">Nom</label>';
                echo "<input type='text' name='nom' value='{$nom}'><br><br>";
                echo '<label for="description">Description</label>';
                echo "<textarea name='description' cols='30' rows='10'>{$description}</textarea><br><br>";
                echo '<label for="prix">Prix</label>';
                echo "<input type='text' name='prix' value='{$prix}'>";
                echo "<input type='hidden' name='id' value='{$reference}'>";
                //button 
                echo "<input type='submit' value='enregistrer'>";
                ?>
            </form>
        </fieldset>
    </div>
</body>

</html>