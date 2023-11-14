<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendeur Page</title>
</head>
<body>

<!-- Menu -->
<ul>
    <li><a href="?page=article">Article</a></li>
    <li><a href="?page=client">Client</a></li>
    <li><a href="?page=buying">Buying</a></li>
</ul>

<!-- Content -->
<div id="content">
    <?php
    // Check if the 'page' parameter is set in the URL
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        // Include the corresponding page based on the 'page' parameter
        switch ($page) {
            case 'article':
                include 'article.php'; // Include the article page content
                break;
            case 'client':
                include 'client.php'; // Include the client page content
                break;
            case 'buying':
                include 'achat.php'; // Include the buying page content
                break;
            default:
                echo 'Invalid page.';
        }
    }
    ?>
</div>

</body>
</html>
