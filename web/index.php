<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
header("location: login.php");
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    // header()
}
?>