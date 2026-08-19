<?php
require_once "infra/db/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idPrato'])) {
    $idPrato = $_POST['idPrato'];

    $sql = "DELETE FROM prato WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $idPrato);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}


header("Location: index.php");
exit;