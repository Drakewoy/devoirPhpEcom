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

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(lister()>0){
    header("location: ../achat/achat.php");
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer" : 
            if (enregistrer($id_client, $id_article, $quantite, $date) > 0){
                header("location: ../achat/achat.php");
            }
        exit();
          case "modifier":;
        exit();  
    }

}
 function  enregistrer($id_client, $id_article, $quantite, $date){
     $etat = 0;
     //etablir la connexion
     $conn = mysqli_connect('localhost', 'root', '', 'projet');
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

