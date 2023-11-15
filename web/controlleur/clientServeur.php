<?php
$numero_c = $_POST['numero_c'];
$nom_c = $_POST['nom'];
$prenom_c = $_POST['prenom'];
$adresse = $_POST['adresse'];
$codepostal = $_POST['codepostal'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$telephone = $_POST['telephone'];

if($_SERVER['REQUESTE_METHOD'] === 'GET'){

} elseif($_SERVER['REQUESTE_METHOD'] === 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "enregistrer":
          if( enregistrer($numero_c, $nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone) > 0 ){
            hearder("localhost : ../client/client.php");
          }
            exit();
            case "modifier": ;
            exit();
    }

}

function enregistrer($numero_c, $nom, $prenom, $adresse, $codepostal, $ville, $pays, $telephone){
 $etat = 0;
    //etablir la connexion
 $conn = mysqli_connect('localhost', 'root', '', 'projet');
 //passer la requete d'insertion 
 $sql = "INSERT INTO 'clients'('numero','nom','prenom','adresse','codepostal','ville','pays','telephone') VALUES('{$numero_c}', '{$nom}', '{$prenom}', '{$adresse}', '{$codepostal}', '{$ville}', '{$pays}', '{$telephone}')";
 // passer la requete
 $conn -> query($sql);
$etat = 1;
 //fermer la connexion
$conn -> close();
return $etat;
}