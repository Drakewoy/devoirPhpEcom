<?php
// importation de la page connection  a la base de donnee
require_once '../conn/conn.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// la connection
$connection = new Conn($username, $password);
// Vérifiez si la méthode est GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Action à effectuer lorsque la méthode est GET
    $action = $_GET['action'];
    switch ($action) {
        case "login":
            header("location: ../login.html");
            exit();
        case "inscription":
            header("location: ../inscription.html");
            exit();
                // default:header("location: accueil.html")
            ;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case "login":
            login($username, $password);
            exit();
        case "inscription":
            if (inscription($username, $password) > 0) {
                header("location: ../login.html");
            } else {
                echo "error";
            }
            exit();
        default:
            header("location: ../login.html");
    }
} else {
    // Action par défaut si la méthode n'est ni GET ni POST
}

function login($username, $password)
{
    $connection = new Conn($username, $password);
    $userRole = $connection->connecter();
    if ($userRole == 'vendeur') {
        $_SESSION['username'] = $username;
        header("location:  ../admin/admin.php");
    } elseif ($userRole == 'comptable') {
        $_SESSION['username'] = $username;
        header("location: ../admin/admin.php");
    } elseif ($userRole == 'default') {
        $_SESSION['username'] = $username;
        header("location: ../index.php");
    } elseif ($userRole == 'eA') {
        $erreur = "Nom d'utilisation ou Mot de pass invalide";
        $_SESSION['erreur'] = $erreur;
        header("location: ../login.html");
    } else {
        header("location: ../login.html");
    }
}

function inscription($username, $password)
{
    $n = 0;
    // etablir la connection 
    $conn =  $conn = mysqli_connect("localhost", "root", "", "projet");
    // reque de l'enregistrement
    $sql = "INSERT INTO `user` (`nom`, `pass`) VALUES ('{$username}', '{$password}')";
    // Executer la requete
    $conn->query($sql);
    $n = 1;
    $conn->close();

    return $n;
}
