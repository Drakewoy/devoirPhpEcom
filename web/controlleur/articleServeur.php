<?php
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case "enregistrer":
            if (enregistrer($nom, $description, $prix) > 0) {
                header("location: ../article/article.php");
            }

            exit();
        case "modifier":;
            exit();
    }
}

function enregistrer($nom, $description, $prix)
{
    $etat = 0;
    // etablir la connection 
    $conn = mysqli_connect('localhost', 'root', '', 'projet');
    // preparer la requete d'insertion 
    $sql = "INSERT INTO `articles` (`nom`, `description`, `prix`) VALUES ('{$nom}', '{$description}', '{$prix}')";
    // passer la requete
    $conn->query($sql);
    $etat = 1;
    // fermer la connection
    $conn->close();
    return $etat;
}
