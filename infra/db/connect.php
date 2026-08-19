<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "Sistema_Cadastro_de_Pratos"; 

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>