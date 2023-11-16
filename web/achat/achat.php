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
            <th>id_clients</th>
            <th>id_articles</th>
            <th>quantite</th>
            <th>date</th>
        </tr>
        <tr>
            <?php
            session_start();
            if (isset($_SESSION['listAchat'])) {
                foreach ($_SESSION['listAchat'] as $row) {
                    echo "<td>".$row['id_achat']."</td>";
                    echo "<td>".$row['id_client']."</td>";
                    echo "<td>".$row['id_article']."</td>";
                    echo "<td>".$row['quantite']."</td>";
                    echo "<td>".$row['date']."</td>";
                }
            }
            ?>
        </tr>
    </table>