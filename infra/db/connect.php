<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "Sistema_Cadastro_de_Pratos";
    
    $conn = new mysqli($host,$user,$pass,$db);

   
?>