<?php
// importation de la page connection  a la base de donnee
require_once '../conn/conn.php';
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['role'])) {
    $role = $_POST['role'];
}

// la connection
// $connection = new Conn($username, $password);
// Vérifiez si la méthode est GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Action à effectuer lorsque la méthode est GET
    $action = $_GET['action'];
    switch ($action) {
        case "login":
            header("location: ../login.php");
            exit();
        case "inscription":
            header("location: ../inscription.php");
            exit();
        default:
            unset($_SESSION['username']);
            header("location: ../login.php");
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case "login":
            login($username, $password);
            exit();
        case "inscription":
            if (inscription($username, $password, $role) > 0) {
                header("location: ../login.php");
            } else {
                echo "error";
            }
            exit();
        default:
            header("location: ../login.php");
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
    } elseif ($userRole == 'eA') {
        $erreur = "Nom d'utilisation ou Mot de pass invalide";
        $_SESSION['erreur'] = $erreur;
        header("location: ../login.php");
    } else {
        header("location: ../login.php");
    }
}

function inscription($username, $password, $role)
{
    $n = 0;
    // etablir la connection 
    $conn =  $conn = mysqli_connect("localhost", "root", "", "projet");
    // reque de l'enregistrement
    $sql = "INSERT INTO `user` (`nom`, `pass`, `role`) VALUES ('{$username}', '{$password}', '{$role}')";
    // Executer la requete
    $conn->query($sql);
    $n = 1;
    $conn->close();
    return $n;
}
