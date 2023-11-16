<?php
session_start();
$id_client;
$id_article;
$quantite;
$date;

if (isset($_POST['id_client'])){
    $id_client = $_POST['id_client'];
}

if (isset($_POST['id_article'])){
    $id_article = $_POST['id_article'];
}

if (isset($_POST['quantite'])){
    $quantite = $_POST['quantite'];
}

if (isset($_POST['date'])){
    $date = $_POST['date'];
}

if (isset($_GET['page']) && isset($_GET['dir'])) {
    $page = $_GET['page'];
    $dir = $_GET['dir'];
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(lister($user)>0){
        header("location: ../vendeur/vendeur.php?page=$page&dir=$dir");
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer" : 
            if (enregistrer($id_client, $id_article, $quantite, $date, $user) > 0){
                header("location: ../vendeur/vendeur.php?page=ajou_achat&dir=achat");
            }
        exit();
          case "modifier":;
        exit();  
    }

}
 function  enregistrer($id_client, $id_article, $quantite, $date, $user){
     $etat = 0;
     //etablir la connexion
     $conn = mysqli_connect('localhost', $user, $user, 'projet');
     //preparer la requete d'insertion
     $sql = "INSERT INTO `achats` (`id_client`, `id_article`, `quantite`,`date`) VALUES('{$id_client}','{$id_article}', '{$quantite}', '{$date}')"; 
     //passer la requete sql
     $conn->query($sql);
     $etat = 1;
     //fermer la connexion
     $conn->close();  
     return $etat;
 }

 // La methode d'affichage'
function lister($user){
    $etat = 0;
    // Etablir la connection
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
    // preparer la requete 
    $sql = "SELECT * FROM `achats`";
    // passer la requete
    $resultat = $conn->query($sql);
    if ($resultat->num_rows > 0) {
        $etat =1;
        $_SESSION['listAchat'] = $resultat->fetch_all(MYSQLI_ASSOC);
    }
    // fermer la connection
    $conn->close();
    return $etat;
}



