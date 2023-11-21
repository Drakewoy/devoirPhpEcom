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

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
if (isset($_POST['id'])) {
  $id = $_POST['id'];
}

if (isset($_POST['numero'])) {
  $numero = $_POST['numero'];
}
if (isset($_POST['nom'])) {
  $nom = $_POST['nom'];
}
if (isset($_POST['prenom'])) {
  $prenom = $_POST['prenom'];
}
if (isset($_POST['adresse'])) {
  $adresse = $_POST['adresse'];
}
if (isset($_POST['codepostal'])) {
  $codepostal = $_POST['codepostal'];
}
if (isset($_POST['ville'])) {
  $ville = $_POST['ville'];
}
if (isset($_POST['pays'])) {
  $pays = $_POST['pays'];
}
if (isset($_POST['telephone'])) {
  $telephone = $_POST['telephone'];
}

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}

if (isset($_GET['page']) && isset($_GET['dir'])) {
  $page = $_GET['page'];
  $dir = $_GET['dir'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $action = $_GET['action'];
  if ($action == 'enregistrer') {
    header("location: ../admin/admin.php?page=ajou_client&dir=client");
  } elseif ($action == "modifier") {
    if (recherche($id, $user) > 0) {
      header("location: ../admin/admin.php?page=mod_client&dir=client");
    }
  } else {
    if (lister($user) > 0) {
      header("location: ../admin/admin.php?page=$page&dir=$dir");
    } else {
      unset($_SESSION['listClient']);
      header("location: ../admin/admin.php?page=$page&dir=$dir");
    }
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'];
  switch ($action) {
    case "enregistrer":
      if (enregistrer($nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone, $user) > 0) {
        header("location: ../admin/admin.php?page=ajout_client&dir=client");
      }
      exit();
    case "modifier":
      if (modifier($nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone, $user, $id) > 0) {
        lister($user);
        header("location: ../admin/admin.php?page=modClient&dir=client");
      };
      exit();
  }
}

function enregistrer($nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone, $user)
{
  $etat = 0;
  try {
    //etablir la connexion
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
    //passer la requete d'insertion 
    $sql = "INSERT INTO `clients`(`nom`,`prenom`,`adresse`,`codepostal`,`ville`,`pays`,`telephone`) VALUES( '{$nom}', '{$prenom}', '{$adresse}', '{$codepostal}', '{$ville}', '{$pays}', '{$telephone}')";
    // passer la requete
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

// La methode de l'enregistrement
function lister($user)
{
  $etat = 0;
  // Etablir la connection
  $conn = mysqli_connect('localhost', $user, $user, 'projet');
  // preparer la requete 
  $sql = "SELECT * FROM `clients`";
  // passer la requete
  $resultat = $conn->query($sql);
  if ($resultat->num_rows > 0) {
    $etat = 1;
    $_SESSION['listClient'] = $resultat->fetch_all(MYSQLI_ASSOC);
  }
  // fermer la connection
  $conn->close();
  return $etat;
}

// La methode de la modification
function  modifier($nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone, $user, $id)
{
  $etat = 0;
  try {
    //etablir la connexion
    $conn = mysqli_connect('localhost', $user, $user, 'projet');
    //preparer la mise a jour
    $sql = "UPDATE `clients` SET 
  `nom` = '{$nom}', `prenom` = '{$prenom}', 
  `adresse` = '{$adresse}', `codepostal` = '{$codepostal}',
   `ville` = '{$ville}', `pays` = '{$pays}', 
   `telephone` = '{$telephone}' 
  WHERE `numero` = {$id}";
    //passer la requete sql
    $conn->query($sql);
    $etat = 1;
    //fermer la connexion
    $conn->close();
  } catch (mysqli_sql_exception $e) {
    $_SESSION['error_message'] = "Vous n'avez pas de droit a la mise a jour!!!";
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
  $sql = "SELECT * FROM `clients` WHERE numero = {$id}";
  $resultat = $conn->query($sql);
  $_SESSION['res_rechCli'] = $resultat->fetch_assoc();
  $etat = 1;
  $conn->close();
  return $etat;
}
