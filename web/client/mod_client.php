<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Un Client</title>
</head>

<body>
    <div class="page">
        <fieldset>
            <legend>Moidifier Un Client</legend>
            <form action="../controlleur/clientServeur.php" method="post">
                <input type="hidden" name="action" value="modifier">
                <?php
                session_start();
                $numero;
                $nom;
                $prenom;
                $adresse;
                $codepostal;
                $ville;
                $pays;
                $telephone;
                if (isset($_SESSION['res_rechCli'])) {
                    $numero = $_SESSION['res_rechCli']['numero'];
                    $nom = $_SESSION['res_rechCli']['nom'];
                    $prenom = $_SESSION['res_rechCli']['prenom'];
                    $adresse = $_SESSION['res_rechCli']['adresse'];
                    $codepostal = $_SESSION['res_rechCli']['codepostal'];
                    $ville = $_SESSION['res_rechCli']['ville'];
                    $pays = $_SESSION['res_rechCli']['pays'];
                    $telephone = $_SESSION['res_rechCli']['telephone'];
                }
                echo  '<label for="id_client">Id Client</label>';
                echo "<input type='text' name='id_client' value='{$numero}'><br><br>";
                echo '<label for="nom">Nom</label>';
                echo "<input type='text' name='nom' value='{$nom}'><br><br>";
                echo '<label for="prenom">Prenom</label>';
                echo "<input type='text' name='prenom' value='{$prenom}'><br><br>";
                echo '<label for="adresse">Adresse</label>';
                echo "<textarea name='adresse'  cols='30' rows='10' >{$adresse}</textarea><br><br>";
                echo '<label for="codepostal">Code postal</label>';
                echo "<input type='text' name='codepostal' value='{$codepostal}'><br><br>";
                echo '<label for="ville">Ville</label>';
                echo "<input type='text' name='ville' value='{$ville}'><br><br>";
                echo '<label for="pays">Pays</label>';
                echo "<input type='text' name='pays' value='{$pays}'><br><br>";
                echo '<label for="telephone">Telephone</label>';
                echo "<input type='text' name='telephone' value='{$telephone}'><br><br>";
                echo "<input type='hidden' name='id' value='{$numero}'><br><br>";
                echo "<input type='submit' value='Modifier'>";
                ?>
            </form>

        </fieldset>
    </div>
</body>

</html>