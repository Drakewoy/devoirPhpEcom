<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Clients</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Telephone</th>
        </tr>
        <tr>
            <?php
            session_start();
            if (isset($_SESSION['listClients']) && !empty($_SESSION['listClients'])) {
                foreach ($_SESSION['listClients'] as $row) {
                    echo "<td>".$row['numero']."</td>";
                    echo "<td>".$row['nom']."</td>";
                    echo "<td>".$row['prenom']."</td>";
                    echo "<td>".$row['adresse']."</td>";
                    echo "<td>".$row['codepostal']."</td>";
                    echo "<td>".$row['ville']."</td>";
                    echo "<td>".$row['pays']."</td>";
                    echo "<td>".$row['telephone']."</td>";
                }
            }
            ?>
        </tr>
    </table>