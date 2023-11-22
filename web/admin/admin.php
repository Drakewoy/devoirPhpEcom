<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendeur</title>
</head>

<body>
    <?php
    session_start();
    if($_SESSION['username'] == null){
        header("location: ../controlleur/loginServeur.php");
    }
    ?>
    <div class="conteneur">
        <div style="width:100%; background-color: lightblue;" class="head">
        <p style="position: absolute; right: 15px; top:10px; text-decoration: none; font-size: 20px; clear: both;"><a href="../controlleur/loginServeur.php">Deconnection</a></p>
           <?php
                 
                    if (isset($_SESSION['username'])) {
                        echo "<p style='color:blue; font-size: 29px;'> Utilisateur : " . $_SESSION['username'] . "</p>";
                    }
                    ?> 

        </div>
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
                        include("../" . "$dir/$page.php");
                    }
                } ?>
            </div>
        </div>
    </div>
</body>

</html>