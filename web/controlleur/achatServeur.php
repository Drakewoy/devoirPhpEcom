<?php
$id_clients = $_POST['id_clients'];
$id_articles = $_POST['id_articles'];
$quantite = $_POST['quantite'];
$date = $_POST['date'];

if ($_SERVER['REQUEST_METHOD'] === 'GET'){

}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer" : 
            if (enregistrer($id_clients, $id_articles, $quantite, $date) > 0){
                header("location : ../achat/achat.php");
            }
          exit();
          case "modifier" : ;
            exit();  

    }

}
 function  enregistrer($id_clients, $id_articles, $quantite, $date){
     $etat = 0;
     //etablir la connexion
     $conn = mysqli_connect('localhost', 'root', '', 'projet');
     //preparer la requete d'insertion
     $sql = "INSERT INTO 'achats'('id_clients', 'id_articles', 'quantite', 'date') VALUES('{$id_clients}','{$id_articles}', '{$quantite}', '{$date}')"; 
     //passer la requete sql
     $conn -> query($sql);
     $etat = 1;
     //fermer la connexion
     $conn -> close();
     return $etat;

 }

