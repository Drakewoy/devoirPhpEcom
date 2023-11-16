<?php
session_start();
class Conn
{
    public $username;
    public $password;

    
    function __construct($username =null, $password=null)
    {
        $this->username = $username;
        $this->password = $password;
    }

    // Creer une connection
    function connecter()
    {
        // etablir une connection par default
        $conn = mysqli_connect("localhost", "root", "", "projet");
        $_SESSION['db_con'] = $conn;
        // chercher l'utilisateur dans la base de donnee
        $query = "SELECT role FROM user WHERE nom ='{$this->username}' AND pass ='{$this->password}'";
        // executer la requete
        $resultat = $conn->query($query);
        // verification de la connection
        if (!$conn) {
            die("Connection echouee: " . mysqli_connect_error());
        } else {
            if ($resultat->num_rows > 0) {
                $row = $resultat->fetch_assoc();
                $this->username = $row['nom'];
                $role = $row['role'];
                $_SESSION['user']=$role;
                // fermer la connection par default
                $conn->close();
                // etablir une nouvelle connection en fonction du role
                if ($role == 'default') {
                    // reetablir la connection par default
                    $conn = mysqli_connect("localhost", "root", "", "projet");
                } else {
                    $conn = mysqli_connect("localhost", $role, $role, "projet");
                }
                return $role;
            } 
            else{
                $error = "eA";
                $conn->close();
                return $error;
            }
             }
             return $conn;
        }
    }
    

