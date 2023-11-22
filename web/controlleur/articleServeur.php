<?php
session_start();
$nom;
$description;
$prix;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

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
if (isset($_POST['prix'])) {
    $prix = $_POST['prix'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'];
    if ($action == 'enregistrer') {
        unset($_SESSION['error_message']);
        header("location: ../admin/admin.php?page=ajou_article&dir=article");
    } elseif ($action == 'modifier') {
        if (recherche($id, $user) > 0) {
            unset($_SESSION['error_message']);
            header("location: ../admin/admin.php?page=mod_article&dir=article");
        }
    } else {
        if (lister($user) > 0) {
            unset($_SESSION['error_message']);
            header("location: ../admin/admin.php?page=$page&dir=$dir");
        } else {
            unset($_SESSION['listArticle']);
            header("location: ../admin/admin.php?page=$page&dir=$dir");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case "enregistrer":
            if (enregistrer($nom, $description, $prix, $user) > 0) {
                header("location: ../admin/admin.php?page=ajou_article&dir=article");
            } else {
                header("location: ../admin/admin.php?page=ajou_article&dir=article");

            }

            exit();
        case "modifier":
            if (modifier($nom, $description, $prix,  $user, $id) > 0) {
                lister($user);
                header("location: ../admin/admin.php?page=modArticle&dir=article");
            } else {
                header("location: ../admin/admin.php?page=mod_article&dir=article");
            }
            exit();
    }
}

// la methode de l'enregistrement
function enregistrer($nom, $description, $prix, $user)
{
    $etat = 0;
    try {
        // etablir la connection 
        $conn = mysqli_connect('localhost', $user, $user, 'projet');
        // preparer la requete
        $sql = "INSERT INTO `articles` (`nom`, `description`, `prix`) VALUES ('{$nom}', '{$description}', '{$prix}')";
        // passer la requete
        $conn->query($sql);
        $etat = 1;
        // fermer la connection
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error_message'] = "Vous n'avez pas de droit d'insertion!!!";
        header("location: ../admin/admin.php?page=ajou_article&dir=article");
    }
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
        $_SESSION['listArticle'] = $resultat->fetch_all(MYSQLI_ASSOC);
        $etat = 1;
    }
    return $etat;
    // fermer la connection
    $conn->close();
}

// La methode de la modification
function  modifier($nom, $description, $prix,  $user, $id)
{
    $etat = 0;
    try {
        //etablir la connexion
        $conn = mysqli_connect('localhost', $user, $user, 'projet');
        //preparer la mise a jour
        $sql = "UPDATE `articles` SET `nom` = '{$nom}', `description`= '{$description}', `prix`='{$prix}' WHERE reference = {$id}";
        //passer la requete sql
        $conn->query($sql);
        $etat = 1;
        //fermer la connexion
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error_message'] = "Vous n'avez pas de droit a la mise a jour!!!";
    }
    return $etat;
}

// la methode recherche pour proceder a la modification
function recherche($id, $user)
{
    $etat = 0;
    // etablir la connection
    $conn = $conn = mysqli_connect('localhost', $user, $user, 'projet');

    // la requete
    $sql = "SELECT * FROM `articles` WHERE reference = {$id}";
    $resultat = $conn->query($sql);
    $_SESSION['res_rechArt'] = $resultat->fetch_assoc();
    $etat = 1;
    $conn->close();
    return $etat;
}
