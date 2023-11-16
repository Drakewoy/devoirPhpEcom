<?php
session_start();
<<<<<<< HEAD
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
=======

if (isset($_GET['page']) && isset($_GET['dir'])) {
  $page = $_GET['page'];
  $dir = $_GET['dir'];
}

if (isset( $_POST['nom'])) {
  $nom = $_POST['nom'];
}

if (isset( $_POST['prenom'])) {
  $prenom = $_POST['prenom'];
}

if (isset( $_POST['adresse'])) {
  $adresse = $_POST['adresse'];
}

if (isset( $_POST['codepostal'])) {
  $codepostal = $_POST['codepostal'];
}

if (isset( $_POST['ville'])) {
  $ville = $_POST['ville'];
}

if (isset( $_POST['pays'])) {
  $pays = $_POST['pays'];
}

if (isset( $_POST['telephone'])) {
  $telephone = $_POST['telephone'];}

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}
if($_SERVER['REQUEST_METHOD'] === 'GET'){
  if (lister($user) > 0) {
    header("location: ../vendeur/vendeur.php?page=$page&dir=$dir");
}
} elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer":
          if( enregistrer( $nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone, $user) > 0 ){
            header("location: ../vendeur/vendeur.php?page=ajou_client&dir=client");
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
          }
            exit();
            case "modifier":;
            exit();
    }

}

<<<<<<< HEAD
function enregistrer($numero, $nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone){
=======
function enregistrer($nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone, $user){
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
 $etat = 0;
    //etablir la connexion
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
 //passer la requete d'insertion 
<<<<<<< HEAD
 $sql = "INSERT INTO 'clients'('numero','nom','prenom','adresse','codepostal','ville','pays','telephone') VALUES('{$numero}', '{$nom}', '{$prenom}', '{$adresse}', '{$codepostal}', '{$ville}', '{$pays}', '{$telephone}')";
=======
 $sql = "INSERT INTO `clients`(`nom`,`prenom`,`adresse`,`codepostal`,`ville`,`pays`,`telephone`) VALUES( '{$nom}', '{$prenom}', '{$adresse}', '{$codepostal}', '{$ville}', '{$pays}', '{$telephone}')";
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
 // passer la requete
 $conn->query($sql);
$etat = 1;
 //fermer la connexion
$conn->close();
return $etat;
}

<<<<<<< HEAD
// La methode de l'enregistrement
function lister()
{
    // Etablir la connection
    $conn = mysqli_connect('localhost', 'root', '', 'projet');
=======
// La methode d'affichage
function lister($user)
{
    $etat = 0;
    // Etablir la connection
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
    // preparer la requete 
    $sql = "SELECT * FROM `clients`";
    // passer la requete
    $resultat = $conn->query($sql);
    if ($resultat->num_rows > 0) {
<<<<<<< HEAD
        $_SESSION['listClients'] = $resultat->fetch_all(MYSQLI_ASSOC);
    }
    // fermer la connection
    $conn->close();
}
=======
        $_SESSION['listClient'] = $resultat->fetch_all(MYSQLI_ASSOC);
        $etat = 1;
    }
    return $etat;
    // fermer la connection
    $conn->close();
}
>>>>>>> 03cd89448c240d2cb7ea7bb6f3088e855ea15d58
