<?php 

function getDB(){
    $hostname = 'localhost';
    $username = 'root';
    $mdp = '';
    $database = 'employees';
    
    $conn = mysqli_connect($hostname, $username, $mdp, $database);

    if (!$conn) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }

    return $conn;
}

?>