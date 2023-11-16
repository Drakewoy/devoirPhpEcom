<?php
session_start();
$numero;
$nom;
$prenom;
$adresse;
$codepostal;
$ville;
$pays;
$telephone;

if(isset($_POST['numero'])) {
  $numero = $_POST['numero'];
}
  if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
  }
  if (isset($_POST['prenom'])){
$prenom = $_POST['prenom'];
}
if (isset($_POST['adresse'])){
$adresse = $_POST['adresse'];
}
if (isset($_POST['codepostal'])){
$codepostal = $_POST['codepostal'];
}
if (isset($_POST['ville'])){
$ville = $_POST['ville'];
}
if (isset($_POST['pays'])){
$pays = $_POST['pays'];
}
if (isset($_POST['telephone'])){
$telephone = $_POST['telephone'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  lister();
  header("location: ../client/client.php");
} elseif ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer":
          if( enregistrer($numero, $nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone) > 0 ){
            header("location : ../client/client.php");
          }
            exit();
            case "modifier":;
            exit();
    }

}

function enregistrer($numero, $nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone){
 $etat = 0;
    //etablir la connexion
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
 //passer la requete d'insertion 
 $sql = "INSERT INTO 'clients'('numero','nom','prenom','adresse','codepostal','ville','pays','telephone') VALUES('{$numero}', '{$nom}', '{$prenom}', '{$adresse}', '{$codepostal}', '{$ville}', '{$pays}', '{$telephone}')";
 // passer la requete
 $conn->query($sql);
$etat = 1;
 //fermer la connexion
$conn->close();
return $etat;
}

// La methode de l'enregistrement
function lister()
{
    // Etablir la connection
    $conn = mysqli_connect('localhost', 'root', '', 'projet');
    // preparer la requete 
    $sql = "SELECT * FROM `clients`";
    // passer la requete
    $resultat = $conn->query($sql);
    if ($resultat->num_rows > 0) {
        $_SESSION['listClients'] = $resultat->fetch_all(MYSQLI_ASSOC);
    }
    // fermer la connection
    $conn->close();
}
