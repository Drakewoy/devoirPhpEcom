<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendeur</title>
</head>

<body>
    <div class="conteneur">
        <div class="vendeurBox">
            <div class="menu">
                <h1>Insertion</h1>
                <ul>
                    <li><a href="../controlleur/clientServeur.php?page=ajou_client&dir=client">Clients</a></li>
                    <li><a href="../controlleur/achatServeur.php?page=ajout_achat&dir=achat">Achats</a></li>
                    <li><a href="../controlleur/articleServeur.php?page=ajou_article&dir=article">Articles</a></li>
                </ul>
                <h1>Modification</h1>
                <ul>
                    <li><a href="../controlleur/clientServeur.php?page=modClient&dir=client">Clients</a></li>
                    <li><a href="../controlleur/achatServeur.php?page=modAchat&dir=achat">Achats</a></li>
                    <li><a href="../controlleur/articleServeur.php?page=modArticle&dir=article">Articles</a></li>
                </ul>
                <h1>Consultation</h1>
                <ul>
                    <li><a href="../controlleur/clientServeur.php?page=client&dir=client">Clients</a></li>
                    <li><a href="../controlleur/achatServeur.php?page=achat&dir=achat">Achats</a></li>
                    <li><a href="../controlleur/articleServeur.php?page=article&dir=article">Articles</a></li>
                </ul>
            </div>
            <div class="contenu">
                <?php
                //  session_start();
                if(isset($_SESSION['error_message'])){
                    echo "<p>".$_SESSION['error_message']."</p>";
                }
                if (isset($_GET['page']) && isset($_GET['dir'])) {
                    $page = $_GET['page'];
                    $dir = $_GET['dir'];

                    // Define the allowed pages
                    $pages = [
                        'ajou_client', 'ajout_achat', 'ajou_article',
                        'mod_client', 'mod_achat', 'mod_article',
                        'client', 'achat', 'article', 'modAchat',
                        'modArticle', 'modClient'
                    ];

                    // Check if the selected page is allowed
                    if (in_array($page, $pages)) {
                        // Include the corresponding page
                        include("../"."$dir/$page.php");
                    }
                } ?>
            </div>
        </div>
    </div>
    <?php
    include('../partiel/footer.html');
    ?>
</body>

</html>