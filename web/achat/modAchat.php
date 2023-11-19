<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste achats</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>id_achat</th>
            <th>id_clients</th>
            <th>id_articles</th>
            <th>quantite</th>
            <th>date</th>
            <th>Nom_clients</th>
            <th>Nom_articles</th>
            <th>Prix / Unit</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        <?php
        session_start();
        if (isset($_SESSION['listAchat'])) {
            foreach ($_SESSION['listAchat'] as $row) {
                echo " <tr>";
                echo "<td>" . $row['id_achat'] . "</td>";
                echo "<td>" . $row['id_client'] . "</td>";
                echo "<td>" . $row['id_article'] . "</td>";
                echo "<td>" . $row['quantite'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['nomA'] . "</td>";
                echo "<td>" . $row['prix'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td><a href='../controlleur/achatServeur.php?id={$row['id_achat']}&action=modifier'> Modifier </a></td>";
                echo  "</tr>";
            }
        }
        ?>
        </tr>
    </table>