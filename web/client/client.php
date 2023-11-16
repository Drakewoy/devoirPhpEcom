<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Liste Clients</title>
=======
    <title>Document</title>
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
</head>

<body>
    <table border="1">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
<<<<<<< HEAD
            <th>Code Postal</th>
=======
            <th>Code postal</th>
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
            <th>Ville</th>
            <th>Pays</th>
            <th>Telephone</th>
        </tr>
<<<<<<< HEAD
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
=======
        <?php
        session_start();
        if (isset($_SESSION['listClient'])) {
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
    </table>
</body>

</html>
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
