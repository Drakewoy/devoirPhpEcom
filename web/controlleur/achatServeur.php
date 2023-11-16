<?php
session_start();
<<<<<<< HEAD
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
=======

if (isset($_GET['page']) && isset($_GET['dir'])) {
    $page = $_GET['page'];
    $dir = $_GET['dir'];
}
$id_clients = $_POST['id_clients'];
$id_articles = $_POST['id_articles'];
$quantite = $_POST['quantite'];
$date = $_POST['date'];
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(lister()>0){
    header("location: ../achat/achat.php");
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer" : 
<<<<<<< HEAD
            if (enregistrer($id_client, $id_article, $quantite, $date) > 0){
                header("location: ../achat/achat.php");
=======
            if (enregistrer($id_clients, $id_articles, $quantite, $date, $user) > 0){
                header("location : ../achat/achat.php");
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
            }
        exit();
          case "modifier":;
        exit();  
    }

}
<<<<<<< HEAD
 function  enregistrer($id_client, $id_article, $quantite, $date){
=======
 function  enregistrer($id_clients, $id_articles, $quantite, $date, $user){
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
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

 // La methode de l'enregistrement
function lister(){
    $etat = 0;
    // Etablir la connection
    $conn = mysqli_connect('localhost', 'root', '', 'projet');
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

