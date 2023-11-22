<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste article</title>
    
</head>

<body>
    <div class="page">
        <table border="1" align="center">
            <tr>
                <th>Reference</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
            </tr>
            <tr>
                <?php
               
                if (isset($_SESSION['listArticle'])) {
                    foreach ($_SESSION['listArticle'] as $row) {
                        echo " <tr>";
                        echo "<td>" . $row['reference'] . "</td>";
                        echo "<td>" . $row['nom'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['prix'] . "</td>";
                        echo " </tr>";
                    }
                }
                ?>
            </tr>
        </table>
    </div>
</body>

</html>