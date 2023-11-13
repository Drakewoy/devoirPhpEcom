<?php
// index.php

// Vérifiez si la méthode est GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Action à effectuer lorsque la méthode est GET
    header("location: accueil.html");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = $_POST["action"];
   switch(action){

   }
} else {
    // Action par défaut si la méthode n'est ni GET ni POST
}

function utilisateur ($action){
if ($action == "login"){
    if()
}
}
?>
