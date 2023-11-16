<?php
session_start();
$nom;
$description;
$prix;
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['prix'])) {
    $prix = $_POST['prix'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // if($action == "list"){
    lister();
    header("location: ../article/article.php");
    // }
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

// la methode de l'enregistrement
function enregistrer($nom, $description, $prix)
{
    $etat = 0;
    // etablir la connection 
    $conn = mysqli_connect('localhost', 'root', '', 'projet');
    // preparer la requete
    $sql = "INSERT INTO `articles` (`nom`, `description`, `prix`) VALUES ('{$nom}', '{$description}', '{$prix}')";
    // passer la requete
    $conn->query($sql);
    $etat = 1;
    // fermer la connection
    $conn->close();
    return $etat;
}

// La methode de l'enregistrement
function lister()
{
    // Etablir la connection
    $conn = mysqli_connect('localhost', 'root', '', 'projet');
    // preparer la requete 
    $sql = "SELECT * FROM `articles`";
    // passer la requete
    $resultat = $conn->query($sql);
    if ($resultat->num_rows > 0) {
        $_SESSION['listAtircle'] = $resultat->fetch_all(MYSQLI_ASSOC);
    }
    // fermer la connection
    $conn->close();
}
