<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste article</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Reference</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
        <tr>
            <?php
            session_start();
            if (isset($_SESSION['listArticle'])) {
                foreach ($_SESSION['listArticle'] as $row) {
                    echo " <tr>";
                    echo "<td>".$row['reference']."</td>";
                    echo "<td>".$row['nom']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['prix']."</td>";
                    echo "<td><a href='../controlleur/articleServeur.php?id={$row['reference']}&action=modifier'> Modifier </a></td>";
                    echo " </tr>";
                }
            }
            ?>
        </tr>
    </table>

</body>

</html>