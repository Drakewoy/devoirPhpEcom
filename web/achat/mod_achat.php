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
        <form action="../controlleur/achatServeur.php" method="post">
        <input type="hidden" name="action" value="modifier"
            <?php
            session_start();
            // variable 
            $id_achat = null;
            $id_client = null;
            $id_article = null;
            $quantite = null;
            $date = null;
            $data[] = "";
            if (isset($_SESSION['res_rechAch'])) {

                $id_achat = $_SESSION['res_rechAch']['id_achat'];
                $id_client = $_SESSION['res_rechAch']['id_client'];
                $id_article = $_SESSION['res_rechAch']['id_article'];
                $quantite = $_SESSION['res_rechAch']['quantite'];
                $date = $_SESSION['res_rechAch']['date'];
            }
            echo '<label for="id_achat">Id achat</label>';
            echo "<input type='number' disabled name='id_achat' value='$id_achat'><br><br>";
            echo '<label for="id_clients">Id client</label>';
            echo "<input type='number' name='id_client' value='$id_client'><br><br>";
            echo '<label for="id_articles">Id article</label>';
            echo "<input type='number' name='id_article' value='$id_article'><br><br>";
            echo '<label for="quantite">Quantite</label>';
            echo "<input type='number' name='quantite' value='$quantite'><br><br>";
            echo '<label for="date">Date</label>';
            echo "<input type='date' name='date' value='$date'><br><br>";
            echo '<input type="submit"  value="Modifier">';
            echo "<input type='hidden' name='id' value='$id_achat'><br><br>";

            ?>
        </form>

    </fieldset>
</body>

</html>