<?php
session_start();

if (isset($_GET['page']) && isset($_GET['dir'])) {
    $page = $_GET['page'];
    $dir = $_GET['dir'];
}
$id_clients = $_POST['id_clients'];
$id_articles = $_POST['id_articles'];
$quantite = $_POST['quantite'];
$date = $_POST['date'];

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(lister()>0){
    header("location: ../achat/achat.php");
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer" : 
            if (enregistrer($id_clients, $id_articles, $quantite, $date, $user) > 0){
                header("location : ../achat/achat.php");
            }
        exit();
          case "modifier":;
        exit();  
    }

}
 function  enregistrer($id_clients, $id_articles, $quantite, $date, $user){
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

