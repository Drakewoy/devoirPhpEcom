<?php
session_start();
$id_client;
$id_article;
$quantite;
$date;
$action;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if (isset($_POST['id_client'])) {
    $id_client = $_POST['id_client'];
}

if (isset($_POST['id_article'])) {
    $id_article = $_POST['id_article'];
}

if (isset($_POST['quantite'])) {
    $quantite = $_POST['quantite'];
}

if (isset($_POST['date'])) {
    $date = $_POST['date'];
}

if (isset($_GET['page']) && isset($_GET['dir'])) {
    $page = $_GET['page'];
    $dir = $_GET['dir'];
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($action == 'enregistrer') {
        header("location: ../admin/admin.php?page=ajou_achat&dir=achat");
    } elseif ($action == 'modifier') {
        if (recherche($id, $user) > 0) {
            header("location: ../admin/admin.php?page=mod_achat&dir=achat");
        }
    } else {
        if (lister($user) > 0) {
            header("location: ../admin/admin.php?page=$page&dir=$dir");
        } else {
            unset($_SESSION['listAchat']);
            header("location: ../admin/admin.php?page=$page&dir=$dir");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case "enregistrer":
            lister($user);
            if (enregistrer($id_client, $id_article, $quantite, $date, $user) > 0) {
                header("location: ../admin/admin.php?page=ajou_achat&dir=achat");
            }
            exit();
        case "modifier":
            if (modifier($id_client, $id_article, $quantite, $date, $user, $id) > 0) {
                lister($user);
                header("location: ../admin/admin.php?page=modAchat&dir=achat");
            }

            exit();
    }
}


function  enregistrer($id_client, $id_article, $quantite, $date, $user)
{
    $etat = 0;
    try {
        //etablir la connexion

        $conn = mysqli_connect('localhost', $user, $user, 'projet');
        //preparer la requete d'insertion
        $sql = "INSERT INTO `achats` (`id_client`, `id_article`, `quantite`,`date`) VALUES('{$id_client}','{$id_article}', '{$quantite}', '{$date}')";
        //passer la requete sql
        $conn->query($sql);
        $etat = 1;
        //fermer la connexion
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error_message'] = "Vous n'avez pas de droit d'insertion!!!";
        error_log("Error: " . $e->getMessage());
    }
    return $etat;
}

// La methode d'affichage'
function lister($user)
{
    $etat = 0;
    // Etablir la connection
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
    // preparer la requete 
    $sql = "SELECT ach.id_achat, ach.id_client, ach.id_article,ach.quantite, ach.date, cl.numero, cl.nom, cl.prenom,art.reference, art.nom AS 'nomA', art.description, art.prix, SUM(prix) as `total`  FROM articles art, achats ach, clients cl 
    WHERE ach.id_client = cl.numero AND ach.id_article = art.reference group by prix; ";
    // passer la requete
    $resultat = $conn->query($sql);
    if ($resultat->num_rows > 0) {
        $etat = 1;
        $_SESSION['listAchat'] = $resultat->fetch_all(MYSQLI_ASSOC);
    }
    // fermer la connection
    $conn->close();
    return $etat;
}

// La methode de la modification
function  modifier($id_client, $id_article, $quantite, $date, $user, $id)
{
    $etat = 0;
    try {
        //etablir la connexion
        $conn = mysqli_connect('localhost', $user, $user, 'projet');
        //preparer la mise a jour
        $sql = "UPDATE `achats` SET `id_client` = {$id_client}, `id_article`= {$id_article}, `quantite`={$quantite},`date`='{$date}' WHERE id_achat = {$id}";
        //passer la requete sql
        $conn->query($sql);
        $etat = 1;
        //fermer la connexion
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error_message'] = "Vous n'avez pas de droit a la mise a jourF!!!";
        error_log("Error: " . $e->getMessage());
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
    $sql = "SELECT * FROM `achats` WHERE id_achat = {$id}";
    $resultat = $conn->query($sql);
    $_SESSION['res_rechAch'] = $resultat->fetch_assoc();
    $etat = 1;
    $conn->close();
    return $etat;
}
