<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendeur</title>
    <style>
        
    </style>
</head>

<body>
    <div class="conteneur">
        <div class="vendeurBox">
            <div class="menu">
                <h1>Insertion</h1>
                <ul>
                    <li><a href="vendeur.php?page=ajou_client&dir=client">Clients</a></li>
                    <li><a href="vendeur.php?page=ajout_achat&dir=achat">Achats</a></li>
                    <li><a href="vendeur.php?page=ajou_article&dir=article">Articles</a></li>
                </ul>
                <h1>Modification</h1>
                <ul>
                    <li><a href="vendeur.php?page=mod_client&dir=client">Clients</a></li>
                    <li><a href="vendeur.php?page=mod_achat&dir=achat">Achats</a></li>
                    <li><a href="vendeur.php?page=mod_article&dir=article">Articles</a></li>
                </ul>
                <h1>Consultation</h1>
                <ul>
                    <li><a href="../controlleur/clientServeur.php?page=client&dir=client">Clients</a></li>
                    <li><a href="vendeur.php?page=achat&dir=achat">Achats</a></li>
                    <li><a href="../controlleur/articleServeur.php?page=article&dir=article">Articles</a></li>
                </ul>
            </div>
            <div class="contenu">
                <?php
//  session_start();
                if (isset($_GET['page']) && isset($_GET['dir'])) {
                    $page = $_GET['page'];
                    $dir = $_GET['dir'];

                    // Define the allowed pages
                    $pages = [
                        'ajou_client', 'ajout_achat', 'ajou_article',
                        'mod_client', 'mod_achat', 'mod_article',
                        'client', 'achat', 'article'
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