<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Clients</title>
</head>

<body>
    <div class="page">
        <table border="1" align="center">
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

            <?php
         
            if (isset($_SESSION['listClient']) && !empty($_SESSION['listClient'])) {
                foreach ($_SESSION['listClient'] as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['numero'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "<td>" . $row['adresse'] . "</td>";
                    echo "<td>" . $row['codepostal'] . "</td>";
                    echo "<td>" . $row['ville'] . "</td>";
                    echo "<td>" . $row['pays'] . "</td>";
                    echo "<td>" . $row['telephone'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tr>
        </table>
    </div>
</body>

</html>
