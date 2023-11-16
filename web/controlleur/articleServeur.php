<?php
session_start();
$nom;
$description;
$prix;
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
}
if (isset($_GET['page']) && isset($_GET['dir'])) {
    $page = $_GET['page'];
    $dir = $_GET['dir'];
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if ($_POST['prix']) {
    $prix = $_POST['prix'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (lister($user) > 0) {
        header("location: ../vendeur/vendeur.php?page=$page&dir=$dir");
    }
    // echo "".$user;

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case "enregistrer":
            if (enregistrer($nom, $description, $prix, $user) > 0) {
                header("location: ../vendeur/vendeur.php?page=ajou_article&dir=article");
            }

            exit();
        case "modifier":;
            exit();
    }
}

// la methode de l'enregistrement
function enregistrer($nom, $description, $prix, $user)
{
    $etat = 0;
    // etablir la connection 
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
    // preparer la requete
    $sql = "INSERT INTO `articles` (`nom`, `description`, `prix`) VALUES ('{$nom}', '{$description}', '{$prix}')";
    // passer la requete
    $conn->query($sql);
    $etat = 1;
    // fermer la connection
    $conn->close();
    return $etat;
}

// La methode d'affichage
function lister($user)
{
    $etat = 0;
    // Etablir la connection
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
    // preparer la requete 
    $sql = "SELECT * FROM `articles`";
    // passer la requete
    $resultat = $conn->query($sql);
    if ($resultat->num_rows > 0) {
        $_SESSION['listAtircle'] = $resultat->fetch_all(MYSQLI_ASSOC);
        $etat = 1;
    }
    return $etat;
    // fermer la connection
    $conn->close();
}
